<?php
	function funcQuery($ask){
		include("mysql_connect.php");

		if( isset($ask['id']) && $ask['id']!="" ){
			$sql = "select * from ".$db_equip." where id = '{$ask['id']}'";
			$result = mysql_query($sql) or die(mysql_error());
			$row = mysql_fetch_row($result);
			if( $row[0]=="" ){
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
