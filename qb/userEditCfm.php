<?php
	$userid = $_POST['userid'];
	
	$newPwd = $_POST['newPwd'];

	include('../database/fUserEdit.php');
	$re = funcUserEdit( array( "username" => $userid, "password" => $newPwd) );
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