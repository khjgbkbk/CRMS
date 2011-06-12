<?php
	include("../database/fEdit.php");
	
	$EquivName 	= $_POST['EquivName']	;
	$EquivPlace = $_POST['EquivPlace']	;
	$EquivId	= $_POST['EquivId']		;
	$EquivPrice = $_POST['EquivPrice']	;
	
	$return = funcEdit( array("name" => $EquivName, "dorm" => $EquivPlace, "id" => $EquivId, "price" => $EquivPrice) );
	if(!$return["success"])
	{
		echo json_encode($return["status"]);
	}
	else
	{
		echo json_encode("success");
	}
?>
