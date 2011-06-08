<?php
	function funcUsers($ask=NULL){
		$column_size = 4;
		include("mysql_connect.php");

		if(!isset($ask['sort'])) $ask['sort'] = "name";

		if( isset($ask['privilege']) && $ask['privilege']!="" ){
			$sql = "select * from ".$db_shadow." where dorm = '{$ask['privilege']}' order by {$ask['sort']}";
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
		}else{
			$sql = "select * from ".$db_shadow." order by {$ask['sort']}";
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
