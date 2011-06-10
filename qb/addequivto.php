<?php
	include("../database/fNew.php");
	$addEquivName 	= htmlspecialchars ($_POST['addEquivName'] );
	$addEquivPlace	= htmlspecialchars ($_POST['addEquivPlace']);
	$addEquivId		= htmlspecialchars ($_POST['addEquivId']   );
	$addEquivPrice	= htmlspecialchars ($_POST['addEquivPrice']);
	
	$addEquivName 	= mysql_real_escape_string ($addEquivName );
	$addEquivPlace	= mysql_real_escape_string ($addEquivPlace);
	$addEquivId		= mysql_real_escape_string ($addEquivId	  );	
	$addEquivPrice	= mysql_real_escape_string ($addEquivPrice);
	
	$return = funcNew( array("name" => $addEquivName, "dorm" => $addEquivPlace, "id" => $addEquivId, "price" => $addEquivPrice) );
	if($return["success"])
	{
		echo json_encode("success");
	}
	else
	{
		echo json_encode("fail");
	}
?>
