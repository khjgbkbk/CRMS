<?php
	include("../database/fEdit.php");
	$return = funcEdit( array("name" => $_POST['addEquivName'], "dorm" => $_POST['addEquivPlace'], "id" => $_POST['addEquivId'], "price" => $_POST['addEquivPrice']) );
	if(!$return["success"])
	{
		echo json_encode($return["status"]);
	}
	else
	{
		echo json_encode("success");
	}
?>
