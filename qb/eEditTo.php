<?php
	include("../database/fEdit.php");
	
	$EquivName 	= mysql_real_escape_string ( $_POST['EquivName']);
	$EquivPlace = mysql_real_escape_string ( $_POST['EquivPlace']);
	$EquivId	= mysql_real_escape_string ( $_POST['EquivId']);
	$EquivPrice = mysql_real_escape_string ( $_POST['EquivPrice']);
	
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
