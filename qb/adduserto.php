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
		$return = funcLogin( array("username" => $_POST['UsrID'],"password" => $_POST['UsrPW']) );
		if(false)
		{
			echo json_encode("success");
		}
		else
		{
			echo json_encode("fail");
		}
	}
?>
