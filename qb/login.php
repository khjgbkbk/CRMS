<?php
	//header('WWW-Authenticate: Basic realm="My Realm"');
	echo $_SERVER['PHP_AUTH_USER']." : ".$_SERVER['PHP_AUTH_PW'];
	exit;
	if(!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']))
	{
		//header('WWW-Authenticate: Basic realm="My Realm"');
		//header('HTTP/1.1 401 Unauthorized');
		echo "error";
	}
	else if($_SERVER['PHP_AUTH_USER']=="") 
	{
		echo "nid";
	} 
	else if($_SERVER['PHP_AUTH_PW']=="")
	{
		echo "npd";
	}
	else if ($_SERVER['PHP_AUTH_USER']=="mkfsn" && $_SERVER['PHP_AUTH_PW']=="kanade")
	{
		header('HTTP/1.1 200 ok');
		$username = $_SERVER['PHP_AUTH_USER'];
		$password = $_SERVER['PHP_AUTH_PW'];
		unset($_SERVER['PHP_AUTH_USER']);
		unset($_SERVER['PHP_AUTH_PW']);
		echo '<form method="post" name="kakusu" action="main.php">';
		echo '<input type="hidden" name="Uid" value="'.$username.'">';
		echo '<input type="hidden" name="Upd" value="'.$password.'">';
		echo '</form>';
		echo '<script language="JavaScript">';
		echo 'document.kakusu.submit();';
		echo '</script>';
	}
	else
	{
		header('WWW-Authenticate: Basic realm="My Realm"');
		header('HTTP/1.1 401 Unauthorized');
		echo 'error';
	}
?>