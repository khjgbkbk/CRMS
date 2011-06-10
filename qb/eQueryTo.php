<?php
	include("../database/fQuery.php");
	$Id = mysql_real_escape_string ($_POST['Id']);
	$return = funcQuery( array("id" => $Id) );
	if(!$return["success"])
	{
		echo json_encode("fail");
		exit;
	}
	else
	{
		$data = $return['data'];
		echo json_encode($return['data']);
		exit;
	}
?>
