<?php
    require_once('includes/connect.php');     // Connection Script
    require_once('includes/settings.php');       // Setting Script


if(isset($_GET['id']))
{
 	$action = $_GET['id'];
}
else
{
	$action = NULL;
}


include "views/header.php";


switch($action)
{
	case "home":
		include "views/main.php";	
		break;
	case "participant":
		include "views/participants.php";
		break;
	case "volunteer":
		include "views/volunteers.php";
		break;
	default:
		include "views/main.php";
		break;
}

include "views/footer.php";
?>