<?php
	include("../database/fEdit.php");
	
	$EquivName 	= htmlspecialchars ( $_POST['EquivName']	);
	$EquivPlace = htmlspecialchars ( $_POST['EquivPlace']);
	$EquivId	= htmlspecialchars ( $_POST['EquivId']);
	$EquivPrice = htmlspecialchars ( $_POST['EquivPrice']);
	
	$EquivName 	= mysql_real_escape_string ( $EquivName  );
	$EquivPlace = mysql_real_escape_string ( $EquivPlace );
	$EquivId = mysql_real_escape_string ( $EquivId );
	$EquivPrice = mysql_real_escape_string ( $EquivPrice );
	
	$return = funcEdit( array("name" => $EquivName, "dorm" => $EquivPlace, "id" => $EquivId, "price" => $EquivPrice) );
	if(!$return["success"])
	{
		echo json_encode($return["status"]);
	}
	else
	{
		echo json_encode("success");
	}
?>
