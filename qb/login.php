<?php
	ob_start();
	session_start();
	if(!isset($_POST['UsrID']) || $_POST['UsrID']=="") 
	{
		echo json_encode("nid");
	} 
	else if(!isset($_POST['UsrPW']) || $_POST['UsrPW']=="")
	{
		echo json_encode("npd");
	}
	else
	{
		include("../database/fLogin.php");
		$return = funcLogin(array("username" => $_POST['UsrID'],"password" =>  $_POST['UsrPW']));
		if($return['success'])
		{
			echo json_encode("success");
			$_SESSION["loginid"] = $_POST['UsrID'];
			$_SESSION["loginpwd"] = $_POST['UsrPW'];
		}
		else
		{
			echo json_encode("noaccess");
		}
	}
?>