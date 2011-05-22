<?php
	ob_start();
	session_start();
?>
<html>
<head>
<title>CRMS</title>
<link rel="shortcut icon" href="/image/qb_ico.gif">
</head>
<body bgcolor="#EBF5FF"  link="1C19FF" vlink="1C19FF">
<?php
if(isset($_SESSION["loginid"]) && isset($_SESSION["loginpwd"]))
{
?> 
		<div align='center'>
			<h1>CRMS::SERVER.Main</h1>
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
		
		<div align=center>
			<table style="">
				<tbody>
				<tr>
					<td>
						<a href="adduser.php">[新增使用者]</a>
					</td>
					<td>
						&nbsp
					</td>
					<td>
						<a href="">[編輯使用者]</a>
					</td>
					<td>
						&nbsp
					</td>
					<td>
						<a href="">[刪除使用者]</a>
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