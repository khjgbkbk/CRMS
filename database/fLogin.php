<?php
	function funcLogin($user){
	/*
	*Login Success When ['success'] eq true or eq false
	*/
		include("mysql_connect.php");
		
		if( isset($user['username']) && isset($user['password']) && $user['username']!="" && $user['password']!="" ){
			//
			$sql = "SELECT * FROM ".$db_shadow." where name = '{$user['username']}'";
			$result = mysql_query($sql);
			if(!$result)
				return array("success" => false, "status"=>"Connect failed");
			$row = mysql_fetch_row($result);

			if( $row[1]==$user['username'] && $row[2]==$user['password'] ){
				return array("success" => true);
			}else{
				return array("success" => false, "status"=>"nosuchaccount");
			}
		}else{
			//
			return array("success" => false, "status"=>"???");
		}
	}
?>
