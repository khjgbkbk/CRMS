<?php
ob_start();
session_start();

if(isset($_SESSION["loginid"]) && isset($_SESSION["loginpwd"]))
{
	include("../database/fUsers.php");
	$re = funcUsers(NULL);
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
			<td>使用者編號</td>
			<td>使用者名稱</td>
			<td>權限</td>
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
				if( $j != 2 )
				{
?>
		<td>
			<?php 
				
					echo $data[$i][$j]; 
			?>
		</td>	
<?php
				}
			}
?>
		<td><input type="button" id="dele" value="刪除"></td>
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

