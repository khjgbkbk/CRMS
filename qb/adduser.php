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
			$('div.message').html('�п�J�b��!');
			return;
		}
		if( $("input[name='addUsrpwd']").attr('value') == "" )
		{
			$('div.message').html('�п�J�K�X!');
			return;
		}
		if( $("input[name='addCmUsrpwd']").attr('value') == "" )
		{
			$('div.message').html('�ЦA��J�@���K�X!');
			return;
		}
		if( $("input[name='addUsrpwd']").attr('value') != $("input[name='addCmUsrpwd']").attr('value') )
		{
			$('div.message').html('�K�X��J�����T!');
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
				case "failed":
					$('input[name="addUsrid"]').attr({value:''}); 
					$('input[name="addUsrpwd"]').attr({value:''}); 
					alert('Failed !!');
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
</script>
<title>CRMS</title>
<link rel="shortcut icon" href="/image/qb.png">
</head>
<body bgcolor="#EBF5FF"  link="1C19FF" vlink="1C19FF">
<?php
if(isset($_SESSION["loginid"]) && isset($_SESSION["loginpwd"]))
{
?> 
		<div align='center'>
			<h1>CRMS::SERVER.AddUser</h1>
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
					<input type="button" value="�e�X" id="Send">
					<input type="button" value="��^" id="Goback">
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