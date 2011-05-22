<?php
	ob_start();
	session_start();
?>
<html>
<head>
<script type="text/javascript" src="jquery-1.2.6.js"></script>
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
	$(document).ready(function () 
	{
		$('#Send').click(function()
		{
			send();
		});
		$('#Goback').click(function()
		{
			document.location.href="./";
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
<title>CRMS</title>
<link rel="shortcut icon" href="image/qb_ico.gif">
</head>
<body bgcolor="#EBF5FF"  link="1C19FF" vlink="1C19FF">
<?php
if(isset($_SESSION["loginid"]) && isset($_SESSION["loginpwd"]))
{
?> 
		<div align='center'>
			<h1>CRMS::SERVER.AddUser</h1>
		</div>
		
		<div align='right'>
			<table style="position:absolute; right:13px; top:13px; z-index:0; overflow:hidden; border: 3px dotted rgb(109, 2, 107);">
				<tbody>
				<td>
					<a href='./logout.php'>Log out</a>
				</td>
				</tbody>
			</table>
		</div>
		
		<br>
		<div align="center">
			<table style="border: 5px dotted rgb(109, 2, 107); " align="center" cellPadding="10" frame="border">
			<tbody>
			<tr>
				<td>
					Username:
				</td>
				<td>
					<input type="text" name="addUsrid">
				</td>
			</tr>
			<tr>
				<td>
					Password:
				</td>
				<td>
					<input type="text" name="addUsrpwd">
				</td>
			</tr>
			<tr>
				<td>
					Comfirm password:
				</td>
				<td>
					<input type="text" name="addCmUsrpwd">
				</td>
			</tr>
			<tr>
				<td>
				</td>
				<td align="right">
					<input type="button" value="送出" id="Send">
					<input type="button" value="返回" id="Goback">
				</td>
			</tr>
			</tbody>
			</table>
		</div>
		
<?php	
}
else
{
	header('Location: ./');
	exit;
}
?>
	<br>
	<div align="center" class="message">
	</div>
</body>
</html>