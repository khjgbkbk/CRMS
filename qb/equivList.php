<?php
ob_start();
session_start();

if(isset($_SESSION["loginid"]) && isset($_SESSION["loginpwd"]))
{
	include("../database/fList.php");
	$re = funcList(array("sort" => 'id'));
	if( $re["success"] == true )
	{
		$data = $re["data"];
?>

<!-- Functions -->
<script type="text/javascript">
	function htmlspecialchars(string)  
	{
		return $('<span>').text(string).html();
	}
	function dele()
	{
		$('div#ctr tbody td input[id=dele]').click(function()
		{
			var cfm = confirm("確定要刪除嗎?");
			if( cfm == false )
			{	
				return;
			}
			var id = $(this).parents("tr").find("td:eq(1)").html();
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
			var editname = $(this).parents("tr").find("td:eq(2)").html();
			var editplace = $(this).parents("tr").find("td:eq(6)").html();
			var editid = $(this).parents("tr").find("td:eq(1)").html();
			var editprice = $(this).parents("tr").find("td:eq(4)").html();
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
	function select()
	{
		$('select#place').change(function(){
			var value = $(this).val();
			$('div#ctr tbody').html('');
			$.ajax({
				url: 'equivListBy.php',
				type: 'POST',
				data: {
					place: value,
				},
				dataType: "json",
				error: function(xhr) {
					alert('Ajax request failure');
				},
				success: function(result) {
					switch (result) {
					case "fail":
						break;
					default:
						$.each(result,function(i,v){
							$('div#ctr tbody').append('<tr><td><img src="http://chart.googleapis.com/chart?chs=300x300&cht=qr&chl='+v["id"]+'&choe=UTF-8&chld=h"/></td><td>'+v["id"]+'</td><td>'+htmlspecialchars(v["name"])+'</td><td>'+v["building"]+'</td><td>'+v["price"]+'</td><td>'+v["date"]+'</td><td class="hid">'+v["dorm"]+'</td><td id="btn"><input type="button" id="edit" value="編輯"></td><td id="btn"><input type="button" id="dele" value="刪除"></td></tr>');
						});
						dele();
						edit();
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
		edit();
		select();
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
	div#ctr td{
		text-align:	center;
	}
	div#ctr td img{
		height:60px;
	}
	div#ctr td img:hover{
		height:300px;
	}
	div#ctr tbody td{
		width:		159px;
	}
	div#ctr tbody td#btn{
		width:		10px;
	}
	td.hid{
		display: 	none;
	}
</style>

<div align="center" id="hd">
器材列表
<select type="text" id="place">
<option value="-1">全部</option>
<?php 		
		include('../database/fBuilding.php');
		$location = funcBuilding(NULL);
		foreach( $location['data'] as $key )
		{
?>
			<option value="<?php echo $key['index']; ?>"><?php echo $key['building']; ?></option>
<?php
		}
?>
</select>
<br><br>
</div>
<div align="center" id="ctr">
	<table>
	<thead>
		<tr>
			<td>QRcode</td>
			<td>編號</td>
			<td>名稱</td>
			<td>位置</td>
			<td>價錢</td>
			<td>加入時間</td>
			<td class="hid">00</td>
			<td id="btn">編輯</td>
			<td id="btn">刪除</td>
		</tr>
	</thead>
	<tbody>
<?php
		$row = count($data);
		for($i=0 ; $i<$row ; $i++)
		{
?>
	<tr id="<?php echo $i; ?>" >
		<td><img src="http://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=<?php echo htmlspecialchars ($data[$i]['id']	); ?>&choe=UTF-8&chld=h"/></td>
		<td><?php echo htmlspecialchars ($data[$i]['id']	); ?></td>
		<td><?php echo htmlspecialchars ($data[$i]['name']	); ?></td>
		<td><?php echo htmlspecialchars ($data[$i]['building']	); ?></td>
		<td><?php echo htmlspecialchars ($data[$i]['price']	); ?></td>
		<td><?php echo htmlspecialchars ($data[$i]['date']	); ?></td>
		<td class="hid"><?php echo htmlspecialchars ($data[$i]['dorm']	); ?></td>
		<td id="btn"><input type="button" id="edit" value="編輯"></td>
		<td id="btn"><input type="button" id="dele" value="刪除"></td>
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

