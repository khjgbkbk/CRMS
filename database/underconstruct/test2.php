
<?php

$i=1;

while($i<=3){
	echo "step 0 <br>";
  if ($_SERVER['PHP_AUTH_USER']=='admin' && $_SERVER['PHP_AUTH_PW']=='1234' ) {
	break;  //認證成功，break後往下執行
  }else{
	echo "step 1 <br>";
	header('WWW-Authenticate: Basic realm="try and error"'); //認證失敗，繼續認證
	echo "step 2 <br>";
	header('HTTP/1.0 401 Unauthorized');
	echo '取消認證!'; //當使用者按下取消按扭後出現的訊息
	exit;
  }
  $i++;
}


echo $i."<br>";

?>
