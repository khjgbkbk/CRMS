<?php
	function funcQuery($ask){
		include("mysql_connect.php");

		if( isset($ask['id']) && $ask['id']!="" ){
			$sql = "select * from ".$db_equip." left join ".$db_building." on ".$db_equip.".dorm=".$db_building.".index where id = '{$ask['id']}'";
			$result = mysql_query($sql) or die(mysql_error());
			$row = mysql_fetch_assoc($result);
			if( $row == false ){
				return array("success" => false);
			}else{
				$result = $row;
				return array("success" => true, "data" => $result);
			}
		}else{
			return array("success" => false);
		}
	}
?>
