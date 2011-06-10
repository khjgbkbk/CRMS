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
			alert('請輸入器材名稱!');
			return;
		}
		if( $("select[name='Equivplace']").attr('value') == "-1" )
		{
			alert('請選擇器材位置!');
			return;
		}
		$.ajax({
			url: 'addequivto.php',
			type: 'POST',
			data: {
				addEquivName: 	$("input[name='Equivname']").attr('value'),
				addEquivPlace: 	$("select[name='Equivplace']").attr('value'),
				addEquivPrice: 	$("input[name='Equivprice']").attr('value')
			},
			dataType: "json",
			error: function(xhr) {
				alert('Ajax request failure');
			},
			success: function(result) {
				switch (result) {
				case "success":
					alert('新增成功 !');
					document.location.href = "./";
					break;
				case "fail":
					alert('新增失敗 !');
					$('div#ctr tbody input[type="text"]').each(function(){
						$(this).attr({value:''});
					});
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
	$(document).ready(function () 
	{
		$('#Send').click(function()
		{
			send();
		});
	});
</script>

新增器材
<br><br>
<div align="center" id="ctr">
	<table style="border: 5px dotted rgb(109, 2, 107); " align="center" cellPadding="10" frame="border">
	<tbody>
	<tr>
		<td>名稱:</td>
		<td><input type="text" name="Equivname"></td>
	</tr>
	<tr>
		<td>位置:</td>
		<td>
		<select type="text" name="Equivplace">
		<option value="-1">請選擇</option>
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
		</td>
	</tr>
	<tr>
		<td>價錢:</td>
		<td><input type="text" name="Equivprice"></td>
	</tr>
	</tbody>
	<tfoot>
	<tr>
		<td></td>
		<td align="right"><input type="button" value="送出" id="Send"></td>
	</tr>
	</tfoot>
	</table>
</div>
<div align="center" class="message">
</div>
<?php	
}
?>
	

