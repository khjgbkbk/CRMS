<?php
	function funcBuilding($ask=NULL){
		include("mysql_connect.php");

		if(!isset($ask['sort'])) $ask['sort'] = "building";
		$sql = "select * from ".$db_building." order by ".$ask['sort'];
		$result = mysql_query($sql) or die(mysql_error());
		$data = array();
		while($row = mysql_fetch_assoc($result)){
			$data[] = $row;
		}

		return array("success" => true, "data" => $data);
	}
?>
