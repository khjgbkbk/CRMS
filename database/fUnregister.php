<?php
	function funcUnregister($ask){
		include("mysql_connect.php");

		if( isset($ask['username']) && $ask['username']!="" ){
			$sql = "select * from ".$db_shadow." where name = '{$ask['username']}'";
			$result = mysql_query($sql) or die(mysql_error());
			$row = mysql_fetch_row($result);

			if($row[1]==""){
				return array("success" => false, "status" => "username not exists");
			}else{
				$sql = "delete from ".$db_shadow." where name = '{$ask['username']}'";
				if( mysql_query($sql) or die(mysql_error()) ){
					return array("success" => true);
				}else{
					return array("success" => false, "status" => "delete failed");
				}
			}
		}else{
			return array("success" => false, "status" => "input not complete");
		}
	}
?>
