<?php
	function funcEdit($ask){
		include("mysql_connect.php");

		if( isset($ask['name']) && isset($ask['dorm']) && isset($ask['id']) && isset($ask['price']) && $ask['name']!="" && $ask['dorm']!="" && $ask['id']!="" && $ask['price']!="" ){
			$sql = "select * from ".$db_equip." where id = '{$ask['id']}'";
			$result = mysql_query($sql) or die(mysql_error());
			$row = mysql_fetch_row($result);

			if($row[0]==""){
				return array("success" => false, "status" => "id not exists");
			}else{
				$sql = "update ".$db_equip." set name='{$ask['name']}' , dorm='{$ask['dorm']}' , price='{$ask['price']}' where id = '{$ask['id']}'";
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
