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

<script type="text/javascript">
	function dele()
	{
		$('table#data tbody td input[id=dele]').click(function()
		{
			var cfm = confirm("確定要刪除嗎?");
			if( cfm == false )
			{	
				return;
			}
			alert("你的權限不足");
			return;
			var pid = $(this).parents("tr").attr("id");
			var data = $(this).parents("tr").find("td").html();
			alert(data);
			$(this).parents("tr").remove();
			return;
			$.ajax({
				url: 'deluserfrom.php',
				type: 'POST',
				/*
				data: {
					addUsrID: "<?php echo $data["+pid+"][1]; ?>",
					addUsrPW: "<?php echo $data["+pid+"][2]; ?>"
				},*/
				dataType: "json",
				error: function(xhr) {
					alert('Ajax request failure');
				},
				success: function(result) {
					switch (result) {
					case "fail":
						break;
					default :
						break;
					}
				}
			});
		});
	}
</script>


<!-- 送出相關事件函式 -->
<script type="text/javascript">
	var KEY_ENTER = 13;
	$(document).ready(function () 
	{
		dele();
	})
</script>

<!-- CSS -->
<style type="text/css">
	table#data td{
		width:		100px;
		
	}
</style>
使用者列表
<br><br>
<div align="center">
	<table id="data" style="border: 5px dotted rgb(109, 2, 107);">
	<thead>
		<tr>
			<td>使用者編號</td>
			<td>使用者名稱</td>
			<td>權限</td>
			<td>刪除</td>
		</tr>
	<tbody>
<?php
		for($i=0 ; $i<$row ; $i++)
		{
?>
	<tr id="<?php echo $i; ?>" >
<?php
			for($j=0 ; $j<$col ; $j++)
			{
				if( $j != 2 )
				{
?>
		<td><?php echo $data[$i][$j]; ?></td>	
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

