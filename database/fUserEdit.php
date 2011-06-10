<?php
	function funcUserEdit($ask){
		include("mysql_connect.php");

		if( isset($ask['username']) && isset($ask['password']) && $ask['username']!="" && $ask['password']!="" ){
			$sql = "select * from ".$db_shadow." where name = '{$ask['username']}'";
			$result = mysql_query($sql) or die(mysql_error());
			$row = mysql_fetch_row($result);

			if($row[0]==""){
				return array("success" => false, "status" => "username not found");
			}else{
				$sql = "update ".$db_shadow." set passwd='{$ask['password']}' where name = '{$ask['username']}'";
				if( mysql_query($sql) or die(mysql_error()) ){
					return array("success" => true);
				}else{
					return array("success" => false, "status" => "failed to change password");
				}
			}
		}else{
			return array("success" => false, "status" => "input not complete");
		}
	}
?>
