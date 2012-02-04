<?php
if(isset($argv[1])){
switch($argv[1]){
	case "equipment" :
		include("../database/fDelete.php");
		if(!isset($argv[2])){
			header("HTTP/1.1 400 Bad Request");
			exit;
		}
		$res = funcDelete(array("id" => $argv[2]));
		if($res['success'] == false){
			header("HTTP/1.1 404 Not Found");
		}else{
			header("HTTP/1.1 200 OK");
			echo json_encode($res["data"]);
		}
		exit;
	case "user" :
		header("HTTP/1.1 501 Not Implemented");
		exit;
		include("../database/fRegister.php");
		if(!isset($_POST['data'])){
				header("HTTP/1.1 400 Bad Request");
				exit;
		}
		$res = funcRegister(json_decode($_POST['data'],true));
		if($res['success'] == false){
				header("HTTP/1.1 404 Not Found");
		}else{
				header("HTTP/1.1 200 OK");
				echo json_encode($res["data"]);
		}
		exit;
	}
}else{
		header("HTTP/1.1 400 Bad Request");
}

?>