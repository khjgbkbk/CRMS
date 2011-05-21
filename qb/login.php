<?php
	if(!isset($_POST['UsrID']) || $_POST['UsrID']=="") 
	{
		echo "nid";
	} 
	else if(!isset($_POST['UsrPW']) || $_POST['UsrPW']=="")
	{
		echo "npd";
	}
	else
	{
		include("../database/fLogin.php");
		$return = funcLogin(array("username" => $_POST['UsrID'],"password" =>  $_POST['UsrPW']));
		if($return['success'])
		{
			echo '<form method="post" name="kakusu" action="main.php">';
			echo '<input type="hidden" name="Uid" value="'.$_POST['UsrID'].'">';
			echo '<input type="hidden" name="Upd" value="'.$_POST['UsrPW'].'">';
			echo '</form>';
			echo '<script language="JavaScript">';
			echo 'document.kakusu.submit();';
			echo '</script>';
		}
		else
		{
			echo "error";
		}
	}
?>
