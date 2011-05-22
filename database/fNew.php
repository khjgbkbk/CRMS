<?php
	function funcNew($ask){
		include("mysql_connect.php");

		if( isset($ask['id']) && $ask['id']!="" ){
			$sql = "insert into ".$db_equip." (name, dorm, id, price, date) values ('{$ask['name']}', '{$ask['dorm']}', '{$ask['id']}', '{$ask['price']}', curdate() )";
			if( mysql_query($sql) or die(mysql_error()) ){
				return array("success" => true);
			}else{
				return array("success" => false);
			}
		}else{
			return array("success" => false);
		}
	}
?>
