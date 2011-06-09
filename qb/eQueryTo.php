<?php
	include("../database/fQuery.php");
	$return = funcQuery( array("id" => $_POST['Id']) );
	if(!$return["success"])
	{
		echo json_encode("fail");
	}
	else
	{
		$data = $return['data'];
		echo json_encode($return['data']);
		exit;
		
		
		
		
		echo json_encode('<table style="border: 5px dotted rgb(109, 2, 107); " align="center" cellPadding="10" frame="border">');
		echo json_encode('<tbody>');
		echo json_encode('<tr>');		
		echo json_encode('<td>名稱</td>');
		echo json_encode('<td>位置</td>');
		echo json_encode('<td>編號</td>');
		echo json_encode('<td>價錢</td>');
		echo json_encode('<td>加入時間</td>');
		echo json_encode('</tr>');
		echo json_encode('<tr>');  
/*		
		echo json_encode('<td>'.$data[0].'</td>');
		echo json_encode('<td>'.$data[1].'</td>');
		echo json_encode('<td>'.$data[2].'</td>');
		echo json_encode('<td>'.$data[3].'</td>');
		echo json_encode('<td>'.$data[4].'</td>');
		*/
		echo json_encode('</tr>');
		echo json_encode('/<tbody>');
		echo json_encode('</table>');
	}
?>
