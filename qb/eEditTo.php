<?php
	include("../database/fEdit.php");
	
	$EquivName 	= htmlspecialchars ( $_POST['addEquivName']	);
	$EquivPlace = htmlspecialchars ( $_POST['addEquivPlace']);
	$EquivId 	= htmlspecialchars ( $_POST['addEquivId']	);
	$EquivPrice = htmlspecialchars ( $_POST['addEquivPrice']);
	
	$EquivName 	= mysql_real_escape_string ( $EquivName  );
	$EquivPlace = mysql_real_escape_string ( $EquivPlace );
	$EquivId 	= mysql_real_escape_string ( $EquivId 	);
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
