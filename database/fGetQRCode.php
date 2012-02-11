<?php
function funcGetQRCode($ask){
	require_once("../database/fQuery.php");
	$res = funcQuery($ask);
	if($res['success'] == false){
		return array("success" => false);
	}else{
		$Code = array(
			'version' => 1,
			'id'      => $res["data"]['id'],
			'name'	  => $res["data"]['name']
		);
		$uri = 'https://chart.googleapis.com/chart?chs=300x300&cht=qr&choe=UTF-8&chld=h&chl=' . json_encode($Code);
		return array("success" => true, "data" => $uri);
	}
}
?>