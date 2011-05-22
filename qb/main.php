<?php
	ob_start();
	session_start();
?>
<html>
<head>
<title></title>
</head>
<body>
<?php
if(isset($_SESSION["loginid"]) && isset($_SESSION["loginpwd"]))
{
?> 
		<div align='center'>
			<h1>CRMS::SERVER.MAIN</h1>
		</div>
	
		<div align='right'>
			<table style="position:absolute; right:13px; top:13px; z-index:-1; overflow:hidden; border: 3px dotted rgb(109, 2, 107);">
				<tbody>
				<td>
					<a href='./logout.php'>Log out</a>
				</td>
				</tbody>
			</table>
		</div>
		
		<div align=center>
			<p style="font-size: 50pt;">
				This is main page<br>
				Building...<br>
			</p>
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