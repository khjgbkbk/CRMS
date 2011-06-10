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
		if( $("input[name='Equivplace']").attr('value') == "" )
		{
			alert('請輸入器材所在位置!');
			return;
		}
		$.ajax({
			url: 'addequivto.php',
			type: 'POST',
			data: {
				addEquivName: 	$("input[name='Equivname']").attr('value'),
				addEquivPlace: 	$("input[name='Equivplace']").attr('value'),
				addEquivPrice: 	$("input[name='Equivprice']").attr('value')
			},
			dataType: "json",
			error: function(xhr) {
				alert('Ajax request failure');
			},
			success: function(result) {
				switch (result) {
				case "success":
					alert('Successed !!');
					document.location.href = "./";
					break;
				case "fail":
					alert('Failed !!');
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
	var KEY_ENTER = 13;
	$(document).ready(function () 
	{
		$('#Send').click(function()
		{
			send();
		});
	});
	$(document).keydown(function(event){ 
		//如果按 enter
		if(event.keyCode == KEY_ENTER)
		{
			send();
		}
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
		<td><input type="text" name="Equivplace"></td>
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
	

