<?php
    require_once('../includes/connect.php');        //Connection Script
    require_once('../includes/recaptchalib.php');   // Recaptcha Script
    require_once('../includes/settings.php');       // Setting Script
    require_once('../includes/PHPMailerAutoload.php');  // Mail Class

    $errors = array();
    $data   = array();
    $privateKey = '6LcTexgTAAAAAAFWvBpuL5JUobo31nKatJSZujUX';       // for reCaptcha
    $publicKey = '6LcTexgTAAAAAF3AmILtRDyRJ6HJR2HNi6qrL__k';        // for reCaptcha

    // Validate the variables: last line of defense
    if (empty($_POST['firstName']))
        $errors['firstName'] = 'First name is required.';
    if (empty($_POST['lastName']))
        $errors['lastName'] = 'Last name is required.';
    if (empty($_POST['email']))
        $errors['email'] = 'Email is required.';
    if (empty($_POST['phone']))
        $errors['phone'] = 'US phone number is required.';
    if (empty($_POST['gender']))
        $errors['gender'] = 'Gender is required.';
    if (empty($_POST['shirt']))
        $errors['shirt'] = 'Shirt Size is required.';
    if (empty($_POST['major']))
        $errors['major'] = 'Expected Major is required.';
    if (empty($_POST['street']))
        $errors['street'] = 'Street is required.';
    if (empty($_POST['city']))
        $errors['city'] = 'City is required.';
    if (empty($_POST['state']))
        $errors['state'] = 'State is required.';
    if (empty($_POST['zip']))
        $errors['zip'] = 'Postal code is required.';
    if (empty($_POST['parentName']))
        $errors['parentName'] = 'Parent full name is required.';
    if (empty($_POST['parentDayPhone']))
        $errors['parentDayPhone'] = 'Parent day phone is required.';
    if (empty($_POST['parentNightPhone']))
        $errors['parentNightPhone'] = 'Parent night phone is required.';
    if (empty($_POST['secondaryName']))
        $errors['secondaryName'] = 'Secondary emergency full name is required.';
    if (empty($_POST['secondaryPhone']))
        $errors['secondaryPhone'] = 'Secondary emergency phone is required.';
    if (empty($_POST['arrival']))
        $errors['arrival'] = 'Arrival transportation is required.';
    if (empty($_POST['tour1']))
        $errors['tour1'] = 'Tour preference 1 is required.';
    if (empty($_POST['tour2']))
        $errors['tour2'] = 'Tour preference 2 is required.';
    if (empty($_POST['activity1']))
        $errors['activity1'] = 'Activity preference 1 is required.';
    if (empty($_POST['activity2']))
        $errors['activity2'] = 'Activity preference 2 is required.';
    if (empty($_POST['interests']))
        $errors['interests'] = 'Extracurriculars is required.';
    if (empty($_POST['hopes']))
        $errors['hopes'] = 'Hopes and questions is required.';

    // Validate the reCaptcha
    $reCaptcha = new ReCaptcha($privateKey);
    $reCaptchaResp = $reCaptcha->verifyResponse($_SERVER['REMOTE_ADDR'], $_POST['g-recaptcha-response']);
    if($reCaptchaResp->success==false) {
        $errors['recaptcha'] = "The reCAPTCHA wasn't entered correctly. Go back and try it again. (reCAPTCHA said: " . $reCaptchaResp->errorCodes . ")";
    }

    // Super-double check that no one tries to register when they are not supposed to
    if($PARTICIPANT_SIGNUPS_OPEN == false) {
        $errors['signup-status'] = "Sign ups are currently closed.";
    }

    if (empty($errors)) {

            // Variables from the form
            $firstName          = $_POST['firstName'];
            $lastName           = $_POST['lastName'];
            $nickName           = $_POST['nickName'];
            $email              = $_POST['email'];
            $phone              = $_POST['phone'];
            $gender             = $_POST['gender'];
            $shirt              = $_POST['shirt'];
            $major              = $_POST['major'];
            $health             = $_POST['health'];
            $street             = $_POST['street'];
            $street2            = $_POST['street2'];
            $city               = $_POST['city'];
            $state              = $_POST['state'];
            $zip                = $_POST['zip'];
            $parentName         = $_POST['parentName'];
            $parentDayPhone     = $_POST['parentDayPhone'];
            $parentNightPhone   = $_POST['parentNightPhone'];
            $secondaryName      = $_POST['secondaryName'];
            $secondaryPhone     = $_POST['secondaryPhone'];
            $arrival            = $_POST['arrival'];
            $departEarly        = $_POST['departEarly'];
            $tour1              = $_POST['tour1'];
            $tour2              = $_POST['tour2'];
            $activity1          = $_POST['activity1'];
            $activity2          = $_POST['activity2'];
            $interests          = $_POST['interests'];
            $hopes              = $_POST['hopes'];

            // Prevent MySQL Injections
            $firstName          = mysqli_real_escape_string($connect_site, stripslashes($firstName));
            $lastName           = mysqli_real_escape_string($connect_site, stripslashes($lastName));
            $nickName           = mysqli_real_escape_string($connect_site, stripslashes($nickName));
            $email              = mysqli_real_escape_string($connect_site, stripslashes($email));
            $phone              = mysqli_real_escape_string($connect_site, stripslashes($phone));
            $gender             = mysqli_real_escape_string($connect_site, stripslashes($gender));
            $shirt              = mysqli_real_escape_string($connect_site, stripslashes($shirt));
            $major              = mysqli_real_escape_string($connect_site, stripslashes($major));
            $health             = mysqli_real_escape_string($connect_site, stripslashes($health));
            $street             = mysqli_real_escape_string($connect_site, stripslashes($street));
            $street2            = mysqli_real_escape_string($connect_site, stripslashes($street2));
            $city               = mysqli_real_escape_string($connect_site, stripslashes($city));
            $state              = mysqli_real_escape_string($connect_site, stripslashes($state));
            $zip                = mysqli_real_escape_string($connect_site, stripslashes($zip));
            $parentName         = mysqli_real_escape_string($connect_site, stripslashes($parentName));
            $parentDayPhone     = mysqli_real_escape_string($connect_site, stripslashes($parentDayPhone));
            $parentNightPhone   = mysqli_real_escape_string($connect_site, stripslashes($parentNightPhone));
            $secondaryName      = mysqli_real_escape_string($connect_site, stripslashes($secondaryName));
            $secondaryPhone     = mysqli_real_escape_string($connect_site, stripslashes($secondaryPhone));
            $arrival            = mysqli_real_escape_string($connect_site, stripslashes($arrival));
            $departEarly        = mysqli_real_escape_string($connect_site, stripslashes($departEarly));
            $tour1              = mysqli_real_escape_string($connect_site, stripslashes($tour1));
            $tour2              = mysqli_real_escape_string($connect_site, stripslashes($tour2));
            $activity1          = mysqli_real_escape_string($connect_site, stripslashes($activity1));
            $activity2          = mysqli_real_escape_string($connect_site, stripslashes($activity2));
            $interests          = mysqli_real_escape_string($connect_site, stripslashes($interests));
            $hopes              = mysqli_real_escape_string($connect_site, stripslashes($hopes));

            $ip         = $_SERVER['REMOTE_ADDR'];
            $recipientType = "Participant";

            $participantMail = new PHPMailer;
            $participantMail->setFrom("no-reply@ec.illinois.edu","SITE UIUC");
            $participantMail->addReplyTo("site@ec.illinois.edu", "SITE UIUC");
            $participantMail->addAddress($email, $firstName . " " . $lastName);
            $participantMail->isHTML(true);


            $participants_query = mysqli_query($connect_site, "SELECT * FROM participants")
                    or die("Can not query the TABLE! " . mysqli_error($connect_site));

            if($participants_query->num_rows < $MAX_PARTICIPANTS) {

                // Insert participant into regular table
                $post_query = mysqli_query($connect_site,"INSERT INTO participants (firstName, lastName, nickName, email, phone, gender, shirtSize, major, healthIssues, street, street2, city, state, postalCode, parentName, parentDayPhone, parentNightPhone, secondaryName, secondaryPhone, arrival, departEarly, tour1, tour2, activity1, activity2, interests, expectToGain, ip) VALUES ('$firstName', '$lastName', '$nickName', '$email', '$phone', '$gender','$shirt', '$major', '$health', '$street', '$street2', '$city', '$state', '$zip', '$parentName', '$parentDayPhone', '$parentNightPhone', '$secondaryName','$secondaryPhone', '$arrival', '$departEarly', '$tour1', '$tour2', '$activity1', '$activity2','$interests', '$hopes', '$ip') ") or die("Unable to insert participant. " . mysqli_error($connect_site));

                $data['success'] = true;
                $data['message'] = 'Participant added successfully.';


                // Set up mail subject and body for registered participant
                $participantMail->addAttachment("../views/files/permission_slip.pdf", "SITE-2016-permission-slip.pdf");
                $participantMail->Subject = "Congratulations SITE " . $SITE_YEAR . " Participant!";
                $participantMail->Body = "Hello " . $firstName . ",
                    <br><br>
                    Thank you for signing up with SITE@UIUC! We are pleased to confirm that you will be joining us at this year's Student Introduction To Engineering Program from " . $SITE_MONTH[0] . " " . $SITE_DAY[0] . " to " . $SITE_MONTH[1] . " " . $SITE_DAY[2] . "
                    <br><br>
                    Please send us a check for " . $SITE_FEE . " payable to Engineering Council along with the attached visitation permission slip, signed by you and your parent/guardian, at your earliest convenience. Use the following address: 103C Engineering Hall, 1308 W Green Street, Urbana, IL 61801. We need to receive both the payment and permission slip by " . $SITE_FEEDATE[0] . " " . $SITE_FEEDATE[1] . ". If it is not received by this date, your space will be given to someone on the waiting list.
                    <br><br>
                    Note that while the fee may cover food and housing, it does not cover transportation costs to Urbana-Champaign. However, if you require transportation from the bus stop, the train station, or Willard Airport, we would be happy to accommodate you. Please send us details of your request at site@ec.illinois.edu as soon as possible.
                    <br><br>
                    Once registration is closed and finalized, we will send you another email with more detailed information about the program.
                    <br><br>
                    Congratulations again and we hope you are looking forward to SITE " . $SITE_YEAR . " as much as we are!
                    <br><br><br>
                    Sincerely,
                    <br><br>
                    SITE Committee<br>Engineering Council<br>University of Illinois at Urbana-Champaign";


            }
            else {
                // Insert participant into waiting list table
                $post_query = mysqli_query($connect_site,"INSERT INTO waitlist (firstName, lastName, nickName, email, phone, gender, shirtSize, major, healthIssues, street, street2, city, state, postalCode, parentName, parentDayPhone, parentNightPhone, secondaryName, secondaryPhone, arrival, departEarly, tour1, tour2, activity1, activity2, interests, expectToGain, ip) VALUES ('$firstName', '$lastName', '$nickName', '$email', '$phone', '$gender','$shirt', '$major', '$health', '$street', '$street2', '$city', '$state', '$zip', '$parentName', '$parentDayPhone', '$parentNightPhone', '$secondaryName','$secondaryPhone', '$arrival', '$departEarly', '$tour1', '$tour2', '$activity1', '$activity2', '$interests', '$hopes', '$ip') ") or die("Unable to insert participant. " . mysqli_error($connect_site));

                $data['success'] = true;
                $data['message'] = "Participant added to waiting list.";

                $recipientType = "Wait List Registrant";

                // Set up mail subject and body for registered participant
                $participantMail->Subject = "SITE " . $SITE_YEAR . " Wait List";
                $participantMail->Body = "Hello " . $firstName . ",
                    <br><br>
                    Thank you for signing up with SITE@UIUC! We have received an incredible response for this year's Student Introduction To Engineering Program. Unfortunately at this time, we are filled to our maximum capacity for the program.
                    <br><br>
                    We want to confirm with you that your information is with us and that you have been placed on our waiting list. If space frees up, we will let you know by " . $SITE_CLOSEDATE[0] . " " . $SITE_CLOSEDATE[1] . " if you have been taken off of the waiting list.
                    <br><br><br>
                    Sincerely,
                    <br><br>
                    SITE Committee<br>Engineering Council<br>University of Illinois at Urbana-Champaign";

            }

            // Send confirmation email to participant
            if(!$participantMail->send())
            {
                $errors['email'] = "Mailer Error: " . $participantMail->ErrorInfo . " Please contact " . $WEBMASTER[1] . ".";
            }
            else
            {
                 $data['message'] .= " Thank you! A confirmation email has been sent to your email address.";
            }

            // Send record to webmaster (no API to remove address)
            $partWebMail = new PHPMailer;
            $partWebMail->setFrom("no-reply@ec.illinois.edu","SITE UIUC");
            $partWebMail->addReplyTo("site@ec.illinois.edu", "SITE UIUC");
            $partWebMail->addAddress($WEBMASTER[1], $WEBMASTER[0]);
            $partWebMail->isHTML(true);
            $partWebMail->Subject = "SITE " . $SITE_YEAR . " " . $recipientType;
            $partWebMail->Body = "Hello " . $WEBMASTER[0] . ",
                <br><br>
                The following is information for a recently registered SITE " . $recipientType . ".
                <br><br>
                Name: " . $firstName . " " . $lastName  . "<br>
                Email: " . $email . "<br>
                IP Address: " . $ip . "
                <br><br>" .
                json_encode($_POST) . "
                <br><br><br>
                SITE Committee<br>Engineering Council<br>University of Illinois at Urbana-Champaign";
            if(!$partWebMail->send())
            {
                echo "Mailer Error: " . $partWebMail->ErrorInfo . " Please contact " . $WEBMASTER[1] . ".";
            }

    }

    // If there are any errors in our errors array, return success as false and those errors
    if (!empty($errors)) {
        $data['success'] = false;
        $data['errors']  = $errors;
    }

    // Return all our data to the AJAX call as a JSON object
    echo json_encode($data);

?>
