<?php
	if(!isset($_POST['addUsrID']) || $_POST['addUsrID']=="") 
	{
		echo json_encode("nid");
	} 
	else if(!isset($_POST['addUsrPW']) || $_POST['addUsrPW']=="")
	{
		echo json_encode("npd");
	}
	else
	{
		//include("../database/fLogin.php");
		//$return = funcLogin(array("username" => $_POST['addUsrID'],"password" =>  $_POST['addUsrPW']));
		
		
		$return = array("success" => false);
		if($return['success'])
		{
			echo json_encode("success");
		}
		else
		{
			echo json_encode("failed");
		}
	}
?>
