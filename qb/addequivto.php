<?php
	include("../database/fNew.php");
	$addEquivName 	= mysql_real_escape_string ($_POST['addEquivName'] );
	$addEquivPlace	= mysql_real_escape_string ($_POST['addEquivPlace']);
	$addEquivPrice	= mysql_real_escape_string ($_POST['addEquivPrice']);
	
	$return = funcNew( array("name" => $addEquivName, "dorm" => $addEquivPlace, "id" => "", "price" => $addEquivPrice) );
	if($return["success"])
	{
		echo json_encode("success");
	}
	else
	{
		echo json_encode("fail");
	}
?>
