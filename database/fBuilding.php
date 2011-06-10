<?php
	function funcBuilding($ask=NULL){
	//	$column_size = 3;
		include("mysql_connect.php");

		if(!isset($ask['sort'])) $ask['sort'] = "building";
		$sql = "select * from ".$db_building." order by '{$ask['sort']}'";
	print_r( $sql);
	$result = mysql_query($sql) or die(mysql_error());
		//$row_size = 0;

		while($row = mysql_fetch_row($result)){
			$data[] = $row;
		}
	//	if( count($data) == 0 ){
	//		return array("success" => false, "status" => "nothing found on database");
	//	}else{
		return array("success" => true, "data" => $data);
	//	}
	}
?>
