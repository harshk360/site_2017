<?php
    require_once('../includes/connect.php');        //Connection Script
    require_once('../includes/settings.php');       // Setting Script
    require_once('../includes/PHPMailerAutoload.php');  // Mail Class

    $errors = array();
    $data   = array();

    // Validate the variables
    if (empty($_POST['id']))
        $errors['id'] = 'Id is required.';
    if (empty($_SERVER['PHP_AUTH_USER']) || ($_SERVER['PHP_AUTH_USER']!= "master" && $_SERVER['PHP_AUTH_USER']!="volunteers") )
        $errors['authUser'] = 'Unauthorized user. You do not have permission to do this.';

    if (empty($errors)) {

            // Variables from the form 
            $volunteerId = $_POST['id'];

            // Prevent MySQL Injections
            $volunteerId = mysqli_real_escape_string($connect_site, stripslashes($volunteerId));

            $get_query = mysqli_query($connect_site,"SELECT * FROM volunteers WHERE id='$volunteerId'") or die("Can not query the TABLE! " . mysqli_error($connect_site));
            if($get_query->num_rows==1) {
                // PUT to volunteers
                $put_query = mysqli_query($connect_site, "UPDATE volunteers SET deleted=1 WHERE id='$volunteerId' ") or die("Unable to delete volunteer. " . mysqli_error($connect_site));
                $data['success'] = true;
                $data['message'] = 'Volunteer ' . $_POST['firstName'] . ' ' . $_POST['lastName'] . ' deleted.';

                // Send record to webmaster
                $delWebMail = new PHPMailer;
                $delWebMail->setFrom("no-reply@ec.illinois.edu","SITE UIUC");
                $delWebMail->addReplyTo("site@ec.illinois.edu", "SITE UIUC");
                $delWebMail->addAddress($WEBMASTER[1], $WEBMASTER[0]);
                $delWebMail->isHTML(true);
                $delWebMail->Subject = "SITE " . $SITE_YEAR . " Volunteer Deleted";
                $delWebMail->Body = "Hello " . $WEBMASTER[0] . ",
                    <br><br>
                    Id " . $volunteerId . " was deleted from the volunteers list by " . $_SERVER['PHP_AUTH_USER'] . ".
                    <br><br>" . 
                    json_encode($_POST) . "
                    <br><br><br> 
                    SITE Committee<br>Engineering Council<br>University of Illinois at Urbana-Champaign";
                if(!$delWebMail->send()) {
                    echo "Mailer Error: " . $delWebMail->ErrorInfo . " Please contact " . $WEBMASTER[1] . ".";
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