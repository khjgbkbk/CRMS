<?php
	include("../database/fQuery.php");
	$Id = $_POST['Id'];
	$return = funcQuery( array("id" => $Id) );
	if(!$return["success"])
	{
		echo json_encode("fail");
		exit;
	}
	else
	{
		echo json_encode($return['data']);
		exit;
	}
?>
