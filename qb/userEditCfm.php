<?php
	$userid = $_POST['userid'];
	
	$newPwd = mysql_real_escape_string ($_POST['newPwd']);

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