<?php
function funcGetQRCode($ask){
	require_once("../database/fQuery.php");
	$res = funcQuery($ask);
	if($res['success'] == false){
		return array("success" => false);
	}else{
		$Code = funcMkQRCodeData($res);
		$uri = 'https://chart.googleapis.com/chart?chs=300x300&cht=qr&choe=UTF-8&chld=h&chl=' . urlencode($Code['data']);
		return array("success" => true, "data" => $uri);
	}
}
function funcMkQRCodeData($data){
	$ret = array(
		'version' => 1,
		'id'      => $data['id'],
		'name'	  => $data['name']
	);
	return array('success' => true , 'data' => $json_encode(ret));
}


?>