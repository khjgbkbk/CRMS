<?php

	include("../database/fUnregister.php");
	$return = funcUnregister( array("username" => $_POST['addUsrID'], "password" => $_POST['addUsrPW']) );
	if($return["success"])
	{
		echo json_encode("success");
	}
	else
	{
		echo json_encode("fail");
	}

?>
