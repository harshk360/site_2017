<?php
    require_once('../includes/connect.php');            //Connection Script
    require_once('../includes/recaptchalib.php');       // Recaptcha Script
    require_once('../includes/settings.php');           // Setting Script
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
    if (empty($_POST['netid']))
        $errors['netid'] = 'NetId is required.';
    if (empty($_POST['phone']))
        $errors['phone'] = 'US phone number is required.';
    if (empty($_POST['gender']))
        $errors['gender'] = 'Gender is required.';
    if (empty($_POST['city']))
        $errors['city'] = 'Home city is required.';
    if (empty($_POST['state']))
        $errors['state'] = 'Home state is required.';
    if (empty($_POST['country']))
        $errors['country'] = 'Home country is required.';
    if (empty($_POST['year']))
        $errors['year'] = 'School year is required.';
    if (empty($_POST['major']))
        $errors['major'] = 'School major is required.';
    if (empty($_POST['housing']))
        $errors['housing'] = 'Housing type is required.';
    if (empty($_POST['pastSite']))
        $errors['pastSite'] = 'Past SITE Attendee is required.';
    if (empty($_POST['multiHost']))
        $errors['multiHost'] = 'Ability to host multiple students is required.';
    if (empty($_POST['activity1']))
        $errors['activity1'] = '1st activity preference is required.';
    if (empty($_POST['activity2']))
        $errors['activity2'] = '2nd activity preference is required.';

    // Validate the reCaptcha
    $reCaptcha = new ReCaptcha($privateKey);
    $reCaptchaResp = $reCaptcha->verifyResponse($_SERVER['REMOTE_ADDR'], $_POST['g-recaptcha-response']);
    if($reCaptchaResp->success==false) {
        $errors['recaptcha'] = "The reCAPTCHA wasn't entered correctly. Go back and try it again. (reCAPTCHA said: " . $reCaptchaResp->errorCodes . ")";
    }

    // Super-double check that no one tries to register when they are not supposed to
    if($VOLUNTEER_SIGNUPS_OPEN == false) {
        $errors['signup-status'] = "Sign ups are currently closed.";
    }

    if (empty($errors)) {

            // Variables from the form
            $firstName  = $_POST['firstName'];
            $lastName   = $_POST['lastName'];
            $netId      = $_POST['netid'];
            $phone      = $_POST['phone'];
            $gender     = $_POST['gender'];
            $city       = $_POST['city'];
            $state      = $_POST['state'];
            $country    = $_POST['country'];
            $year       = $_POST['year'];
            $major      = $_POST['major'];
            $minor      = $_POST['minor'];
            $housing    = $_POST['housing'];
            $pastSite   = $_POST['pastSite'];
            $multiHost  = $_POST['multiHost'];
            $activity1  = $_POST['activity1'];
            $activity2  = $_POST['activity2'];
            $engSoc     = $_POST['eng-soc'];
            $interests  = $_POST['interests'];

            // Prevent MySQL Injections
            $firstName  = mysqli_real_escape_string($connect_site, stripslashes($firstName));
            $lastName   = mysqli_real_escape_string($connect_site, stripslashes($lastName));
            $netId      = mysqli_real_escape_string($connect_site, stripslashes($netId));
            $gender     = mysqli_real_escape_string($connect_site, stripslashes($gender));
            $city       = mysqli_real_escape_string($connect_site, stripslashes($city));
            $state      = mysqli_real_escape_string($connect_site, stripslashes($state));
            $country    = mysqli_real_escape_string($connect_site, stripslashes($country));
            $year       = mysqli_real_escape_string($connect_site, stripslashes($year));
            $major      = mysqli_real_escape_string($connect_site, stripslashes($major));
            $minor      = mysqli_real_escape_string($connect_site, stripslashes($minor));
            $housing    = mysqli_real_escape_string($connect_site, stripslashes($housing));
            $pastSite   = mysqli_real_escape_string($connect_site, stripslashes($pastSite));
            $multiHost  = mysqli_real_escape_string($connect_site, stripslashes($multiHost));
            $activity1  = mysqli_real_escape_string($connect_site, stripslashes($activity1));
            $activity2  = mysqli_real_escape_string($connect_site, stripslashes($activity2));
            $engSoc     = mysqli_real_escape_string($connect_site, stripslashes($engSoc));
            $interests  = mysqli_real_escape_string($connect_site, stripslashes($interests));

            $ip         = $_SERVER['REMOTE_ADDR'];

            // Insert volunteer into table
            $post_query = mysqli_query($connect_site,"INSERT INTO volunteers (firstName, lastName, netId, phone, gender, homeCity, homeState, homeCountry, year, major, minor, housing, pastAttendee, multiHost, activity1, activity2, engineeringSociety, interests, ip) VALUES ('$firstName', '$lastName', '$netId', '$phone', '$gender','$city', '$state', '$country', '$year', '$major', '$minor','$housing', '$pastSite', '$multiHost', '$activity1', '$activity2', '$engSoc', '$interests','$ip') ") or die("Unable to insert volunteer. " . mysqli_error($connect_site));
            $data['success'] = true;
            $data['message'] = 'Volunteer added successfully.';

            $volunteerMail = new PHPMailer;
            $volunteerMail->setFrom("no-reply@ec.illinois.edu","SITE UIUC");
            $volunteerMail->addReplyTo("site@ec.illinois.edu", "SITE UIUC");
            $volunteerMail->addAddress($netId . "@illinois.edu", $firstName . " " . $lastName);
            $volunteerMail->isHTML(true);
            $volunteerMail->Subject = "SITE " . $SITE_YEAR . " Volunteer Confirmation";
            $volunteerMail->Body = "Hello " . $firstName . ",
                <br><br>
                Thank you for signing up to be a SITE Volunteer! We hope you are looking forward to SITE " . $SITE_YEAR . " as much as we are.
                <br><br>
                This email is confirmation that we have received your information. Our Volunteer chairs, " . $VOLUNTEERS[0] . " and " . $VOLUNTEERS2[0] . ", will be in touch shortly about next steps, so keep an eye out for more e-mails from us. We promise not to bombard your inbox.
                <br><br><br>
                Regards,
                <br><br>
                SITE Committee<br>Engineering Council<br>University of Illinois at Urbana-Champaign
                <br><br>
                If you believe you have received this email in error, please contact " . $WEBMASTER[0] . " at " . $WEBMASTER[1];
            if(!$volunteerMail->send())
            {
                $errors['email'] = "Mailer Error: " . $volunteerMail->ErrorInfo . " Please contact " . $WEBMASTER[1] . ".";
            }
            else
            {
                 $data['message'] .= " Thank you! A confirmation email has been sent to your Illinois email address.";
            }



            // Send record to webmaster (no API to remove address)
            $volWebMail = new PHPMailer;
            $volWebMail->setFrom("no-reply@ec.illinois.edu","SITE UIUC");
            $volWebMail->addReplyTo("site@ec.illinois.edu", "SITE UIUC");
            $volWebMail->addAddress($WEBMASTER[1], $WEBMASTER[0]);
            $volWebMail->isHTML(true);
            $volWebMail->Subject = "SITE " . $SITE_YEAR . " " . "Volunteer";
            $volWebMail->Body = "Hello " . $WEBMASTER[0] . ",
                <br><br>
                The following is information for a recently registered SITE Volunteer.
                <br><br>
                Name: " . $firstName . " " . $lastName  . "<br>
                Email: " . $netId . "@illinois.edu<br>
                IP Address: " . $ip . "
                <br><br>" .
                json_encode($_POST) . "
                <br><br><br>
                SITE Committee<br>Engineering Council<br>University of Illinois at Urbana-Champaign";
            if(!$volWebMail->send())
            {
                echo "Mailer Error: " . $volWebMail->ErrorInfo . " Please contact " . $WEBMASTER[1] . ".";
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
