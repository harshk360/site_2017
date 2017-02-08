<?php
    require_once('../includes/connect.php');        //Connection Script
    require_once('../includes/settings.php');       // Setting Script
    require_once('../includes/PHPMailerAutoload.php');  // Mail Class

    $errors = array();
    $data   = array();

    // Validate the variables
    if (empty($_POST['id']))
        $errors['id'] = 'Id is required.';
    if (empty($_SERVER['PHP_AUTH_USER']) || ($_SERVER['PHP_AUTH_USER']!= "master") )
        $errors['authUser'] = 'Unauthorized user. You do not have permission to do this.';

    if (empty($errors)) {

        // Variables from the form
        $waitlistId = $_POST['id'];
        // Prevent MySQL Injections
        $waitlistId = mysqli_real_escape_string($connect_site, stripslashes($waitlistId));

        $get_query = mysqli_query($connect_site,"SELECT * FROM waitlist WHERE id='$waitlistId'") or die("Can not query the TABLE! " . mysqli_error($connect_site));
        if($get_query->num_rows==1) {
            // PUT to waitlist: set participant as accepted
            $put_query = mysqli_query($connect_site, "UPDATE waitlist SET accepted=1 WHERE id='$waitlistId' ") or die("Unable to move waitlisted. " . mysqli_error($connect_site));

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

            // Insert participant into regular table
            $post_query = mysqli_query($connect_site,"INSERT INTO participants (firstName, lastName, nickName, email, phone, gender, shirtSize, major, healthIssues, street, street2, city, state, postalCode, parentName, parentDayPhone, parentNightPhone, secondaryName, secondaryPhone, arrival, departEarly, tour1, tour2, activity1, activity2, interests, expectToGain, ip) VALUES ('$firstName', '$lastName', '$nickName', '$email', '$phone', '$gender','$shirt', '$major', '$health', '$street', '$street2', '$city', '$state', '$zip', '$parentName', '$parentDayPhone', '$parentNightPhone', '$secondaryName','$secondaryPhone', '$arrival', '$departEarly', '$tour1', '$tour2', '$activity1', '$activity2', '$interests', '$hopes', '$ip') ") or die("Unable to insert participant. " . mysqli_error($connect_site));

            $data['success'] = true;
            $data['message'] = 'Accepted ' . $_POST['firstName'] . ' ' . $_POST['lastName'] . ' into participant list.';


            // Set up mail subject and body for registered participant
            $partMail = new PHPMailer;
            $partMail->setFrom("no-reply@ec.illinois.edu","SITE UIUC");
            $partMail->addReplyTo("site@ec.illinois.edu", "SITE UIUC");
            $partMail->addAddress($email, $firstName . " " . $lastName);
            $partMail->isHTML(true);
            $partMail->addAttachment("../views/files/permission_slip.pdf", "SITE-2016-permission-slip.pdf");
            $partMail->Subject = "Congratulations SITE " . $SITE_YEAR . " Participant!";
            $partMail->Body = "Hello " . $firstName . ",
                <br><br>
                Thank you for your patience. We are pleased to inform you that you have been moved off the waiting list and will be joining us at this year's Student Introduction To Engineering Program from " . $SITE_MONTH[0] . " " . $SITE_DAY[0] . " to " . $SITE_MONTH[1] . " " . $SITE_DAY[2] . "
                <br><br>
                Please send us a check for " . $SITE_FEE . " payable to Engineering Council along with the attached visitation permission slip, signed by you and your parent/guardian, at your earliest convenience. Use the following address: 103C Engineering Hall, 1308 W Green Street, Urbana, IL 61801. We need to receive both the payment and permission slip as soon as possible. Please let us know via e-mail when you have sent them so that we can confirm your registration for SITE.
                <br><br>
                Note that while the fee may cover food and housing, it does not cover transportation costs to Urbana-Champaign. However, if you require transportation from the bus stop, the train station, or Willard Airport, we would be happy to accommodate you. Please send us details of your request at site@ec.illinois.edu as soon as possible.
                <br><br>
                As the SITE dates near, we will send you another email with more detailed information about the program.
                <br><br>
                Congratulations again and we hope you are looking forward to SITE " . $SITE_YEAR . " as much as we are!
                <br><br><br>
                Sincerely,
                <br><br>
                SITE Committee<br>Engineering Council<br>University of Illinois at Urbana-Champaign";
            // Send confirmation email to participant
            if(!$partMail->send())
            {
                $errors['email'] = "Mailer Error: " . $partMail->ErrorInfo . " Please contact " . $WEBMASTER[1] . ".";
            }
            else
            {
                 $data['message'] .= " Email sent to participant.";
            }


            // Send record to webmaster
            $movWebMail = new PHPMailer;
            $movWebMail->setFrom("no-reply@ec.illinois.edu","SITE UIUC");
            $movWebMail->addReplyTo("site@ec.illinois.edu", "SITE UIUC");
            $movWebMail->addAddress($WEBMASTER[1], $WEBMASTER[0]);
            $movWebMail->isHTML(true);
            $movWebMail->Subject = "SITE " . $SITE_YEAR . " Waitlist Moved";
            $movWebMail->Body = "Hello " . $WEBMASTER[0] . ",
                <br><br>
                Id " . $waitlistId . " was moved from the wait list by " . $_SERVER['PHP_AUTH_USER'] . ".
                <br><br>" .
                json_encode($_POST) . "
                <br><br><br>
                SITE Committee<br>Engineering Council<br>University of Illinois at Urbana-Champaign";
            if(!$movWebMail->send()) {
                echo "Mailer Error: " . $movWebMail->ErrorInfo . " Please contact " . $WEBMASTER[1] . ".";
            }

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
