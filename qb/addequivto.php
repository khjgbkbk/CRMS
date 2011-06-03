<?php
	if( !isset($_POST['addEquivName']) || $_POST['addEquivName']=="" ) 
	{
		echo json_encode("noname");
	} 
	else if( !isset($_POST['addEquivPlace']) || $_POST['addEquivPlace']=="" )
	{
		echo json_encode("noplace");
	}
	else if( !isset($_POST['addEquivId']) || $_POST['addEquivId']=="" )
	{
		echo json_encode("noid");
	}
	else
	{
		include("../database/fNew.php");
		$return = funcNew( array("name" => $_POST['addEquivName'], "dorm" => $_POST['addEquivPlace']), "id" => $_POST['addEquivId']), "price" => $_POST['addEquivPrice']) );
		if($return["success"])
		{
			echo json_encode("success");
		}
		else
		{
			echo json_encode("fail");
		}
	}
?>
