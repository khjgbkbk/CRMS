<?php
	include("../database/fRegister.php");
	$addUsrID = htmlspecialchars ( $_POST['addUsrID'] );
	$addUsrPW = htmlspecialchars ( $_POST['addUsrPW'] );
	$addUsrID = mysql_real_escape_string ( $addUsrID );
	$addUsrPW = mysql_real_escape_string ( $addUsrPW );
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
