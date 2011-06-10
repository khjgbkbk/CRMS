<?php
	include("../database/fNew.php");
	$addEquivName 	= htmlspecialchars ($_POST['addEquivName'] );
	$addEquivPlace	= htmlspecialchars ($_POST['addEquivPlace']);
	$addEquivPrice	= htmlspecialchars ($_POST['addEquivPrice']);
	
	$addEquivName 	= mysql_real_escape_string ($addEquivName );
	$addEquivPlace	= mysql_real_escape_string ($addEquivPlace);
	$addEquivPrice	= mysql_real_escape_string ($addEquivPrice);
	
	$return = funcNew( array("name" => $addEquivName, "dorm" => $addEquivPlace, "id" => "", "price" => $addEquivPrice) );
	if($return["success"])
	{
		echo json_encode("success");
	}
	else
	{
		echo json_encode("fail");
	}
?>
