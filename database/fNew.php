<?php
	function funcNew($ask){
		include("mysql_connect.php");

		if(isset($ask)){
			if(!isset($ask['name'])) $ask['name'] = "UnnamedEquipment";
			if(!isset($ask['dorm'])) $ask['dorm'] = "?";
			if(!isset($ask['id']) || $ask['id']=="") $ask['id'] = date("ymd").sprintf("%05d",time()%86400);
			if(!isset($ask['price'])) $ask['price'] = 0;
//isset($ask['name']) && isset($ask['dorm']) && isset($ask['id']) && isset($ask['price']) && $ask['name']!="" && $ask['dorm']!="" && $ask['id']!="" && $ask['price']!="" ){
			$sql = "select * from ".$db_equip." where id = '{$ask['id']}'";
			$result = mysql_query($sql) or die(mysql_error());
			$row = mysql_fetch_row($result);

			if($row[0]!=""){
				return array("success" => false, "status" => "id exists");
			}else{
				$sql = "insert into ".$db_equip." (name, dorm, id, price, date) values ('{$ask['name']}', '{$ask['dorm']}', '{$ask['id']}', '{$ask['price']}', curdate() )";
				if( mysql_query($sql) or die(mysql_error()) ){
					return array("success" => true);
				}else{
					return array("success" => false, "status" => "insert failed");
				}
			}
		}else{
			return array("success" => false, "status" => "input not complete");
		}
	}
?>
