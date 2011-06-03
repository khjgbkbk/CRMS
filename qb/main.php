<?php
	ob_start();
	session_start();
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>CRMS</title>
<link rel="shortcut icon" href="image/qb_ico.gif">
<style type="text/css">
	.div1{
		position: 	absolute;
		top:		50px;
		left:		200px;	
		float:		left;
	}
	
</style>
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
					&nbsp&nbsp Welcome <?php echo $_SESSION["loginid"]; ?> &nbsp&nbsp
				</td>
				<td>
					&nbsp&nbsp<a STYLE="text-decoration: none" href='./logout.php'>Log out</a>&nbsp&nbsp
				</td>
				</tbody>
			</table>
		</div>
		
		<div class="div1">
			<table>
				<tbody>
				<tr>
					<td>
						<a STYLE="text-decoration: none" href="">[管理]</a>／
					</td>
					<td>
						<a STYLE="text-decoration: none" href="">[系統]</a>／
					</td>
					<td>
						<a STYLE="text-decoration: none" href="">[登出]</a>
					</td>
				</tr>
				</tbody>
			</table>
		</div>
		
		
		
		<div align=center>
			<table style="">
				<tbody>
				<tr>
					<td>
						<a STYLE="text-decoration: none" href="">[使用者列表]</a>
						
					</td>
					<td>
						&nbsp
					</td>
					<td>
						<a STYLE="text-decoration: none" href="adduser.php">[新增使用者]</a>
					</td>
					<td>
						&nbsp
					</td>
					<td>
						<a STYLE="text-decoration: none" href="">[編輯使用者]</a>
					</td>
					<td>
						&nbsp
					</td>
					<td>
						<a STYLE="text-decoration: none" href="deluser.php">[刪除使用者]</a>
					</td>
					
				</tr>
				<tr>
					<td>
						<a STYLE="text-decoration: none" href="">[器材列表]</a>
					</td>
					<td>
						&nbsp
					</td>
					<td>
						<a STYLE="text-decoration: none" href="addequiv.php">[新增器材]</a>
					</td>
					<td>
						&nbsp
					</td>
					<td>
						<a STYLE="text-decoration: none" href="">[編輯器材]</a>
					</td>
					<td>
						&nbsp
					</td>
					<td>
						<a STYLE="text-decoration: none" href="">[刪除器材]</a>
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