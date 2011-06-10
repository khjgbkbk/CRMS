<?php
	function funcList($ask=NULL){
		include("mysql_connect.php");

		if(!isset($ask['sort'])) $ask['sort'] = "id";

		if( isset($ask['dorm']) && $ask['dorm']!="" ){
			$sql = "select * from ".$db_equip." left join ".$db_building." on ".$db_equip.".dorm=".$db_building.".index where dorm = '{$ask['dorm']}' order by {$ask['sort']}";
			$result = mysql_query($sql) or die(mysql_error());
			$data = array();
			while($row = mysql_fetch_assoc($result)){
				$data[] = $row;
			}
			return array("success" => true, "data" => $data);
		}else{
			$sql = "select * from ".$db_equip." left join ".$db_building." on ".$db_equip.".dorm=".$db_building.".index order by {$ask['sort']}";
			$result = mysql_query($sql) or die(mysql_error());
			$data = array();
			while($row = mysql_fetch_assoc($result)){
				$data[] = $row;
			}
			return array("success" => true, "data" => $data);
		}
	}
?>
