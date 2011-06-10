<?php
	function funcPassword($ask){
		include("mysql_connect.php");

		if( isset($ask['name']) && isset($ask['passwd']) && $ask['name']!="" && $ask['passwd']!="" ){
			$sql = "select * from ".$db_shadow." where name = '{$ask['name']}'";
			$result = mysql_query($sql) or die(mysql_error());
			$row = mysql_fetch_row($result);

			if($row[0]==""){
				return array("success" => false, "status" => "name not found");
			}else{
				$sql = "update ".$db_shadow." set passwd='{$ask['passwd']}' where name = '{$ask['name']}'";
				if( mysql_query($sql) or die(mysql_error()) ){
					return array("success" => true);
				}else{
					return array("success" => false, "status" => "failed to change passwd");
				}
			}
		}else{
			return array("success" => false, "status" => "input not complete");
		}
	}
?>
