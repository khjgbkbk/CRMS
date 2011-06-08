<?php
ob_start();
session_start();

if(isset($_SESSION["loginid"]) && isset($_SESSION["loginpwd"]))
{
	include("../database/fList.php");
	$re = funcList(NULL);
	if( $re["success"] == true )
	{
		$data = $re["data"];
		$row = $re["row_size"];
		$col = $re["column_size"];
?>
<div align="center">
	<table style="border: 3px dotted rgb(109, 2, 107);">
	<tbody>
		<tr>
			<td>器材名稱</td>
			<td>器材位置</td>
			<td></td>
			<td>器材價錢</td>
			<td>器材編號</td>
			<td>刪除</td>
		</tr>
<?php
		for($i=0 ; $i<$row ; $i++)
		{
?>
	<tr>
<?php
			for($j=0 ; $j<$col ; $j++)
			{
?>
		<td>
			<?php echo $data[$i][$j]; ?>
		</td>	
<?php
			}
?>
		<td><input type="button" value="刪除"><td>
	</tr>
<?php
		}
	
?>
	</tbody>
	</table>
</div>

<?php
	}
}
?>

