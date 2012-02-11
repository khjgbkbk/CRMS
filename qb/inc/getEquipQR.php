<?php
function getEquipQR($argv){
	if(!isset($argv[2]) || $argv[2] == ""){
		header("HTTP/1.1 400 Bad Request");
		exit;
	}else{
		include("../database/fQuery.php");
		$res = funcQuery(array("id" => $argv[2]));
		if($res['success'] == false){
			header("HTTP/1.1 404 Not Found");
		}else{
			header("HTTP/1.1 200 OK");
			$Code = array(
				'version' => 1,
				'id'      => $res["data"]['id'],
				'name'	  => $res["data"]['name']
			);
			$uri = 'https://chart.googleapis.com/chart?chs=300x300&cht=qr&choe=UTF-8&chld=h&chl=' . json_encode($Code);
			echo json_encode($uri);
		}
	}
}
?>