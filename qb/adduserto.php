<?php
	include("../database/fRegister.php");
	
	$addUsrID = mysql_real_escape_string ( $_POST['addUsrID'] );
	$addUsrPW = mysql_real_escape_string ( $_POST['addUsrPW'] );
	
	$return = funcRegister( array("username" => $addUsrID, "password" => md5($addUsrPW)) );
	if($return["success"])
	{
		echo json_encode("success");
	}
	else
	{
		echo json_encode("fail");
	}
?>
