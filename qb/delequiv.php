<?php

	include("../database/fDelete.php");
	$return = funcDelete( array("id" => $_POST['ID']) );
	if($return["success"])
	{
		echo json_encode("success");
	}
	else
	{
		echo json_encode($return["status"]);
	}

?>
