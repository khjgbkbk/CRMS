<?php
ob_start();
session_start();
//echo "abc";exit;
header('WWW-Authenticate: Basic realm="My Realm"');
if(isset($_SERVER['PATH_INFO'])){
//echo $_SERVER['PATH_INFO'];

$argv = explode("/",$_SERVER['PATH_INFO']);
}else{
$argv = array();
}
//print_r($argv);
if(isset($argv[1]) && $argv[1] == "logout"){
	header('HTTP/1.1 401 Unauthorized');
	echo "Logout successful";
	exit;
}

if(!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])){
	header('HTTP/1.1 401 Unauthorized');
	require("inc/loginPage.php");
	exit;

}else if( $_SERVER['PHP_AUTH_USER']=="" || $_SERVER['PHP_AUTH_PW']=="" ){
	header('HTTP/1.1 401 Unauthorized');
	require("inc/loginPage.php");
	exit;
}else{
	include("../database/config.inc.php");
	if(isset($isCDPA) && $isCDPA){
		include("../database/fCDPALogin.php");
	}else{	
		include("../database/fLogin.php");
	}
	$res = funcLogin(array("username" => $_SERVER['PHP_AUTH_USER'] , "password" => $_SERVER['PHP_AUTH_PW']));
	if($res['success'] == false){
		header('HTTP/1.1 401 Unauthorized');
		require("inc/loginPage.php");
		exit;
	}else{
		header('HTTP/1.1 200 OK');
		require("inc/main.php");
		exit;
	}
}
?>