<?php
	include("../database/fRegister.php");
	
	$addUsrID = $_POST['addUsrID'] ;
	$addUsrPW = $_POST['addUsrPW'] ;
	
	$return = funcRegister( array("username" => $addUsrID, "password" => $addUsrPW) );
	if($return["success"])
	{
		echo json_encode("success");
	}
	else
	{
		echo json_encode("fail");
	}
?>
