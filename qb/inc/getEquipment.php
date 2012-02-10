<?php
function getEquipment($argv){
	if(!isset($argv[2]) || $argv[2] == ""){
		include("../database/fList.php");
		$res = funcList();
		if($res['success'] == false){
			header("HTTP/1.1 404 Not Found");
		}else{
			header("HTTP/1.1 200 OK");
			echo json_encode($res["data"]);
		}
		exit;
	}else{
		include("../database/fQuery.php");
		$res = funcQuery(array("id" => $argv[2]));
		if($res['success'] == false){
			header("HTTP/1.1 404 Not Found");
		}else{
			header("HTTP/1.1 200 OK");
			echo json_encode($res["data"]);
		}
	}
}
?>