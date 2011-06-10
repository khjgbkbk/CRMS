<?php
	$userid = $_POST['userid'];
	
	$newPwd = htmlspecialchars ( $_POST['newPwd']);
	$newPwd = mysql_real_escape_string ( $newPwd );
	
	include('../database/fUserEdit.php');
	$re = funcUserEdit( array( "username" => $userid, "password" => md5($newPwd) ) );
	if( $re["success"] )
	{
		echo json_encode('success');
		exit;
	}
	else
	{
		echo json_encode($re["status"]);
		exit;
	}
?>