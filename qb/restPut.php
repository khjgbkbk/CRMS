<?php
if(isset($argv[1])){
	switch($argv[1]){
	case "equipment" :
		include("../database/fEdit.php");
		if(!isset($_POST['data'])){
			header("HTTP/1.1 400 Bad Request");
			exit;
		}
		$res = funcEdit(json_decode($_POST['data'],true));

		if($res['success'] == false){
			header("HTTP/1.1 404 Not Found");
		}else{
			header("HTTP/1.1 200 OK");
			echo json_encode($res);
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