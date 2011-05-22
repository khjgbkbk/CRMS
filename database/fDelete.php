<?php
	function funcDelete($ask){
		include("mysql_connect.php");

		if( isset($ask['id']) && $ask['id']!="" ){
			$sql = "select * from ".$db_equip." where id = '{$ask['id']}'";
			$result = mysql_query($sql) or die(mysql_error());
			$row = mysql_fetch_row($result);

			if($row[0]==""){
				return array("success" => false, "status" => "id not exists");
			}else{
				$sql = "delete from ".$db_equip." where id = '{$ask['id']}'";
				if( mysql_query($sql) or die(mysql_error()) ){
					return array("success" => true);
				}else{
					return array("success" => false, "status" => "failed to delete");
				}
			}
		}else{
			return array("success" => false, "status" => "input not complete");
		}
	}
?>
