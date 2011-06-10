<?php
	include('../database/fList.php');
	$place = $_POST["place"];
	if($place == "-1")
		$re = funcList( NULL );
	else
		$re = funcList( array("dorm" => $place) );
	if($re["success"])
	{
		echo json_encode($re["data"]);
		exit;
	}
	else
	{
		echo json_encode('fail');
		exit;
	}
?>