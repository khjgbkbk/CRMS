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
		include("../database/fRegister.php");
		$return = funcRegister( array("username" => $_POST['addUsrID'], "password" => md5($_POST['addUsrPW'])) );
		if($return["success"])
		{
			echo json_encode("success");
		}
		else
		{
			echo json_encode("fail");
		}
	}
?>
