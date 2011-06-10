<?php
ob_start();
session_start();
if(isset($_SESSION["loginid"]) && isset($_SESSION["loginpwd"]))
{
?> 
<script type="text/javascript">
	function send()
	{
		if( $("input[name='addUsrid']").attr('value') == "" )
		{
			$('div.message').html('請輸入帳號!');
			return;
		}
		if( $("input[name='addUsrpwd']").attr('value') == "" )
		{
			$('div.message').html('請輸入密碼!');
			return;
		}
		if( $("input[name='addCmUsrpwd']").attr('value') == "" )
		{
			$('div.message').html('請再輸入一次密碼!');
			return;
		}
		if( $("input[name='addUsrpwd']").attr('value') != $("input[name='addCmUsrpwd']").attr('value') )
		{
			$('div.message').html('密碼輸入不正確!');
			return;
		}
		$.ajax({
			url: 'adduserto.php',
			type: 'POST',
			data: {
				addUsrID: $("input[name='addUsrid']").attr('value'),
				addUsrPW: $("input[name='addUsrpwd']").attr('value')
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
					$('div#ctr tbody td input').each(function(){
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
</script>

<div align="center" id="ctr">
	新增使用者資料
	<br><br>
	<table style="border: 5px dotted rgb(109, 2, 107); " align="center" cellPadding="10" frame="border">
	<tbody>
	<tr>
		<td>帳號:</td>
		<td><input type="text" name="addUsrid"></td>
	</tr>
	<tr>
		<td>密碼:</td>
		<td><input type="password" name="addUsrpwd"></td>
	</tr>
	<tr>
		<td>確認密碼:</td>
		<td><input type="password" name="addCmUsrpwd"></td>
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
<br><br>
<div align="center" class="message">

</div>

<?php	
}
?>
