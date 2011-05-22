<?php
	include("mysql_connect.php");

	function ending(){
//			$STATUS['auth'] = 'failed';
			echo "failed";
//			echo json_encode($STATUS);
//			header('HTTP/1.1 401 Unauthorized');
	}

	header('WWW-Authenticate: Basic realm="My Realm"');
	if(!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])){
		ending();
	}else if( $_SERVER['PHP_AUTH_USER']=="" || $_SERVER['PHP_AUTH_PW']=="" ){
		ending();
	}else{
		$sql = "SELECT * FROM ".$db_shadow." where name = '{$_SERVER['PHP_AUTH_USER']}'";
		$result = mysql_query($sql) or die(mysql_error());
		$row = mysql_fetch_row($result);

		if($row[1]!=$_SERVER['PHP_AUTH_USER'] || $row[2]!=$_SERVER['PHP_AUTH_PW']){
			ending();
		}else{
			header("HTTP/1.1 200 OK");		
			echo "succa";
			exit;
		}
	}
?>
