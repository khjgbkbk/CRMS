<?php
	include("../database/fNew.php");
	$addEquivName 	= $_POST['addEquivName'] ;
	$addEquivPlace	= $_POST['addEquivPlace'];
	$addEquivPrice	= $_POST['addEquivPrice'];
	
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
