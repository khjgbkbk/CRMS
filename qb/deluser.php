<?php 
	ob_start();
	session_start();
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
			url: 'deluserfrom.php',
			type: 'POST',
			data: {
				addUsrID: $("input[name='addUsrid']").attr('value'),
				addUsrPW: $("input[name='addUsrpwd']").attr('value'),
			},
			dataType: "json",
			error: function(xhr) {
				alert('Ajax request failure');
			},
			success: function(result) {
				switch (result) {
				case "nid":
					$('div.message').html("Please enter a username");
					break;
				case "npd":
					$('div.message').html("Please enter password !!");
					break;
				case "success":
					alert('Successed !!');
					document.location.href="./";
					break;
				case "fail":
					alert('Failed !!');
					$('input[name="addUsrid"]').attr({value:''}); 
					$('input[name="addUsrpwd"]').attr({value:''}); 
					$('input[name="addCmUsrpwd"]').attr({value:''}); 
					break;
				default:
					$('div.message').html(result);
					break;
				}
			},
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
	})
	$(document).keydown(function(event){ 
		//如果按 enter
		if(event.keyCode == KEY_ENTER)
		{
			send();
		}
	});
</script>

<?php
if(isset($_SESSION["loginid"]) && isset($_SESSION["loginpwd"]))
{
?> 
	<div align="center">
		刪除使用者資料
		<br><br>
		<table style="border: 5px dotted rgb(109, 2, 107); " align="center" cellPadding="10" frame="border">
		<tbody>
		<tr>
			<td>Username:</td>
			<td><input type="text" name="addUsrid"></td>
		</tr>
		<tr>
			<td>Password:</td>
			<td><input type="text" name="addUsrpwd"></td>
		</tr>
		<tr>
			<td>Comfirm password:</td>
			<td><input type="text" name="addCmUsrpwd"></td>
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
<?php	
}
?>

<div align="center" class="message">
	
</div>
