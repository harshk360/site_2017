<?php

    require_once('../includes/connect.php');        //Connection Script
    $data = array();
	$get_query = mysqli_query($connect_site,"SELECT email as EmailAddr FROM participants WHERE deleted=0 ORDER BY email") or die("Can not query the TABLE! " . mysqli_error($connect_site));

	while($eRow = mysqli_fetch_array($get_query)) {
		$data[] = $eRow['EmailAddr'];
	}

	// Return all our data to the AJAX call as a JSON object
	echo json_encode($data);
?>