<?php
ob_start();
session_start();
if(isset($_SESSION["loginid"]) && isset($_SESSION["loginpwd"]))
{
?> 

<script type="text/javascript">
	function send()
	{
		if( $("input[name='Equivname']").attr('value') == "" )
		{
			$('div.message').html('請輸入器材名稱!');
			return;
		}
		$.ajax({
			url: 'eEditTo.php',
			type: 'POST',
			data: {
				EquivName: 		$("input[name='Equivname']").attr('value'),
				EquivPlace: 	$("select[name='Equivplace']").attr('value'),
				EquivId: 		$("input[name='Equivid']").attr('value'),
				EquivPrice: 	$("input[name='Equivprice']").attr('value')
			},
			dataType: "json",
			error: function(xhr) {
				alert('Ajax request failure');
			},
			success: function(result) {
				switch (result) {
				case "success":
					alert('修改成功 !');
					document.location.href = "./";
					break;
				default:
					$('div.message').html(result);
					break;
				}
			}
		});
	}
</script>

<script type="text/javascript">
	var KEY_ENTER = 13;
	$(document).ready(function () 
	{
		$('#Send').click(function()
		{
			send();
		});
	});
</script>

修改器材資訊
<br><br>
<div align="center">
	<table style="border: 5px dotted rgb(109, 2, 107); " align="center" cellPadding="10" frame="border">
	<tbody>
	<tr>
		<td>名稱:</td>
		<td><input type="text" name="Equivname" value="<?php echo $_POST['name'];?>"></td>
	</tr>
	<tr>
		<td>位置:</td>
		<td>
		<select type="text" name="Equivplace">
<?php 		
		include('../database/fBuilding.php');
		$location = funcBuilding(NULL);
		foreach( $location['data'] as $key )
		{
			if($_POST['place']==$key['index'])
			{
?>
				<option selected value="<?php echo $key['index']; ?>"><?php echo $key['building']; ?></option>
<?php
			}
			else
			{
?>
				<option value="<?php echo $key['index']; ?>"><?php echo $key['building']; ?></option>
<?php	
			}
		}
?>
		</select>
		</td>
	</tr>
	<tr>
		<td>編號:</td>
		<td><input type="text" disabled="true" name="Equivid" value="<?php echo $_POST['id'];?>"></td>
	</tr>
	<tr>
		<td>價錢:</td>
		<td><input type="text" name="Equivprice" value="<?php echo $_POST['price'];?>"></td>
	</tr>
	<tr>
		<td></td>
		<td align="right"><input type="button" value="送出" id="Send"></td>
	</tr>
	</tbody>
	</table>
</div>
<br><br>
<div class="message" align="center">

</div>
<?php	
}
?>