<?php
	function funcList($ask){
		$column_size = 5;
		include("mysql_connect.php");

		if(!isset($ask['sort']) $ask['sort'] = "date";

		if( isset($ask['dorm']) && $ask['dorm']!="" ){
			$sql = "select * from ".$db_equip." order by '{$ask['sort']}' where dorm = '{$ask['dorm']}'";
			$result = mysql_query($sql) or die(mysql_error());
			$row_size = 0;
			while($row = mysql_fetch_row($result)){
				$data[$row_size] = $row;
				$row_size++;
			}
			if( $row_size == 0 ){
				return array("success" => false);
			}else{
				return array("success" => true, "row_size" => $row_size, "column_size" => $column_size, $data);
			}
		}else{
			$sql = "select * from ".$db_equip;
			$result = mysql_query($sql) or die(mysql_error());
			$row_size = 0;
			while($row = mysql_fetch_row($result)){
				$data[$row_size] = $row;
				$row_size++;
			}
			if( $row_size == 0 ){
				return array("success" => false);
			}else{
				return array("success" => true, "row_size" => $row_size, "column_size" => $column_size, "data" => $data);
			}
		}
	}
?>
