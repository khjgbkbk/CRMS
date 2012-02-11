<?php
function getEquipQR($argv){
	if(!isset($argv[2]) || $argv[2] == ""){
		header("HTTP/1.1 400 Bad Request");
		exit;
	}else{
		include("../database/fGetQRCode.php");
		$res = funcGetQRCode(array("id" => $argv[2]));
		if($res['success'] == false){
			header("HTTP/1.1 404 Not Found");
		}else{
			header("HTTP/1.1 200 OK");
			echo json_encode($res['data']);
		}
	}
}
?>