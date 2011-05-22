<?php

//echo "abc";exit;
header('WWW-Authenticate: Basic realm="My Realm"');
if(isset($_GET["m"]) && $_GET["m"] = "logout"){
	header('HTTP/1.1 401 Unauthorized');
	echo "Logout successful";
	exit;

}



if(!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])){
	header('HTTP/1.1 401 Unauthorized');
	echo "you can't not pass";
	exit;

}else if( $_SERVER['PHP_AUTH_USER']=="" || $_SERVER['PHP_AUTH_PW']=="" ){
	header('HTTP/1.1 401 Unauthorized');
	echo "you can't not pass2";
	exit;
}else{

	if("admin"!=$_SERVER['PHP_AUTH_USER'] || "admin"!=$_SERVER['PHP_AUTH_PW']){
		header('HTTP/1.1 401 Unauthorized');
		echo "Forget PW?";
		exit;
	}else{
		header("HTTP/1.1 200 OK");		
		echo "welcome my Administrator";
		exit;
	}
}



?>





