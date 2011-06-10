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
					ID: id
				},
				dataType: "json",
				error: function(xhr) {
					alert('Ajax request failure');
				},
				success: function(result) {
					switch (result) {
					case "success":
						break;
					default:
						alert(result);
						break;
					}
				},
			});
			$(this).parents("tr").remove();
		});
	}
	function edit()
	{
		$('div#ctr tbody td input[id=edit]').click(function()
		{
			var cfm = confirm("確定要修改嗎?");
			if( cfm == false )
			{	
				return;
			}
			var editname = $(this).parents("tr").find("td:eq(0)").html();
			var editplace = $(this).parents("tr").find("td:eq(1)").html();
			var editid = $(this).parents("tr").find("td:eq(2)").html();
			var editprice = $(this).parents("tr").find("td:eq(3)").html();
			var data = {
				"name": editname,
				"place": editplace,
				"id": editid,
				"price": editprice
			};
			var link = "equivEdit.php";
			equiEdit(link, data);
			return;
			
		});
	}
</script>


<!-- 送出相關事件函式 -->
<script type="text/javascript">
	var KEY_ENTER = 13;
	$(document).ready(function () 
	{
		dele();
		edit();
	})
</script>

<!-- CSS -->
<style type="text/css">
	div#ctr table{
		border: 5px dotted rgb(109, 2, 107);
		padding-top:   	9px; 
		padding-right:  9px; 
		padding-bottom: 9px; 
		padding-left:   9px;
	}
	div#ctr tbody td{
		width:		100px;
	}
</style>
器材列表
<br><br>
<div align="center" id="ctr">
	<table>
	<thead>
		<tr>
			<td>名稱</td>
			<td>位置</td>
			<td>編號</td>
			<td>價錢</td>
			<td>加入時間</td>
			<td>編輯</td>
			<td>刪除</td>
		</tr>
	</thead>
	<tbody>
<?php
		$row = count($data);
		for($i=0 ; $i<$row ; $i++)
		{
?>
	<tr id="<?php echo $i; ?>" >
		<td><?php echo htmlspecialchars ($data[$i]['name']	); ?></td>
		<td><?php echo htmlspecialchars ($data[$i]['dorm']	); ?></td>
		<td><?php echo htmlspecialchars ($data[$i]['id']	); ?></td>
		<td><?php echo htmlspecialchars ($data[$i]['price']	); ?></td>
		<td><?php echo htmlspecialchars ($data[$i]['date']	); ?></td>
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

