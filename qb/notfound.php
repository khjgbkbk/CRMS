<?php	
	header('HTTP/1.1 404 Not Found');
	header("content-type: text/css; charset=utf-8");
	header('content-type: image/jpeg');
	$im = imagecreatefromjpeg("image/failure.jpg");
	imagejpeg($im);
	imagedestroy($im);
?>