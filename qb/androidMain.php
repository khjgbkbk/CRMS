<?php

//echo "abc";exit;
header('WWW-Authenticate: Basic realm="My Realm"');
if(isset($_SERVER['PATH_INFO'])){
echo $_SERVER['PATH_INFO'];

$argv = explode("/",$_SERVER['PATH_INFO']);
}else{
$argv = array();
}
print_r($argv);
if(isset($argv[1]) && $argv[1] == "logout"){
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
	include("../database/fLogin.php");
	$res = funcLogin(array("username" => $_SERVER['PHP_AUTH_USER'] , "password" => $_SERVER['PHP_AUTH_PW']));
	
	if($res['success'] == false){
		header('HTTP/1.1 401 Unauthorized');
		echo "Forget PW?";
		exit;
	}else{
		//header("HTTP/1.1 200 OK");		
		//echo "welcome my Administrator";
	}
}
switch($_SERVER['REQUEST_METHOD']){
	case 'GET':
		if(isset($argv[1])){
        	switch($argv[1]){
		case "equipment" :
			include("../database/fQuery.php");
			$res = funcQuery(array("id" => $argv[2]));
			if($res['success'] == false){
				header("HTTP/1.1 404 Not Found");
			}else{
				header("HTTP/1.1 200 OK");
				echo json_encode($res["data"]);
			}
        		exit;
		}
		}
        exit;
	default:
	header("HTTP/1.1 501 Not Implemented");
	exit;
}




?>




