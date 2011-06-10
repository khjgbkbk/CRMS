<?php
	include("../database/fEdit.php");
	
	$EquivName 	= htmlspecialchars ( $_POST['addEquivName']	);
	$EquivPlace = htmlspecialchars ( $_POST['addEquivPlace']);
	$EquivPrice = htmlspecialchars ( $_POST['addEquivPrice']);
	
	$EquivName 	= mysql_real_escape_string ( $EquivName  );
	$EquivPlace = mysql_real_escape_string ( $EquivPlace );
	$EquivPrice = mysql_real_escape_string ( $EquivPrice );
	
	$return = funcEdit( array("name" => $EquivName, "dorm" => $EquivPlace, "id" => "", "price" => $EquivPrice) );
	if(!$return["success"])
	{
		echo json_encode($return["status"]);
	}
	else
	{
		echo json_encode("success");
	}
?>
