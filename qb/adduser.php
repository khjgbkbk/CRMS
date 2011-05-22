<?php
	ob_start();
	session_start();
?>
<html>
<head>
<script type="text/javascript" src="jquery-1.2.6.js"></script>
<script type="text/javascript">
	$(document).ready(function () 
	{
		$('#Send').click(function()
		{
			document.location.href="./";
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
					<input type="text" name="Usrid">
				</td>
			</tr>
			<tr>
				<td>
					Password:
				</td>
				<td>
					<input type="text" name="Usrpwd">
				</td>
			</tr>
			<tr>
				<td>
					Comfirm password:
				</td>
				<td>
					<input type="text" name="CmUsrpwd">
				</td>
			</tr>
			<tr>
				<td>
				</td>
				<td align="right">
					<input type="button" value="°e¥X" id="Send">
					<input type="button" value="ªð¦^" id="Goback">
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
</body>
</html>