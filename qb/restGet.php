<?php
if(isset($argv[1])){
	switch($argv[1]){
		case "equipment" :
			require('inc/getEquipment.php');
			getEquipment($argv);
			exit;
		case "location" :
			if(!isset($argv[2]) || $argv[2] == ""){
				include("../database/fBuilding.php");
				$res = funcBuilding();
				if($res['success'] == false){
					header("HTTP/1.1 404 Not Found");
				}else{
					header("HTTP/1.1 200 OK");
					echo json_encode($res["data"]);
				}
				exit;
			}else{
				include("../database/fList.php");
				$res = funcList(array("dorm" => $argv[2]));
				if($res['success'] == false){
					header("HTTP/1.1 404 Not Found");
				}else{
					header("HTTP/1.1 200 OK");
					echo json_encode($res["data"]);
				}

			}
	}
}else{
	header("HTTP/1.1 200 OK");
}


?>