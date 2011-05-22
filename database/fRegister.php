<?php
	function funcRegister($ask){
		include("mysql_connect.php");

		if( isset($ask['username']) && isset($ask['password']) && $ask['username']!="" && $ask['password']!="" ){
			$sql = "select * from ".$db_shadow." where name = '{$ask['username']}'";
			$result = mysql_query($sql) or die(mysql_error());
			$row = mysql_fetch_row($result);

			if($row[1]!=""){
				return array("success" => false, "status" => "username exists");
			}else{
				$sql = "insert into ".$db_shadow." (name, passwd) values ('{$ask['username']}', '{$ask['password']}')";
				if( mysql_query($sql) ){
					return array("success" => true);
				}else{
					return array("success" => false, "status" => "insert failed");
				}
			}
		}else{
			return array("success" => false, "status" => "input incomplete");
		}
	}
//
?>
