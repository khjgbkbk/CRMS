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

<!-- Functions -->
<script type="text/javascript">
	function dele()
	{
		$('div#ctr tbody td input[id=dele]').click(function()
		{
			var cfm = confirm("確定要刪除嗎?");
			if( cfm == false )
			{	
				return;
			}
			var id = $(this).parents("tr").find("td:eq(2)").html();
			$.ajax({
				url: 'delequiv.php',
				type: 'POST',
				data: {
					ID: id,
				},
				dataType: "json",
				error: function(xhr) {
					alert('Ajax request failure');
				},
				success: function(result) {
					switch (result) {
					case "success":
						$(this).parents("tr").remove();
						break;
					default:
						alert(result);
						break;
					}
				},
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
		
		$('#edit').click(function()
		{
			edit();
		});
	})
</script>

<div align="center" id="ctr">
	<table style="border: 3px dotted rgb(109, 2, 107);">
	<tbody>
		<tr>
			<td>名稱</td>
			<td>位置</td>
			<td>編號</td>
			<td>價錢</td>
			<td>加入時間</td>
			<td>編輯</td>
			<td>刪除</td>
		</tr>
<?php
		for($i=0 ; $i<$row ; $i++)
		{
?>
	<tr id="<?php echo $i; ?>" >
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
		<td><input type="button" id="edit" value="編輯"></td>
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

