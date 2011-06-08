<?php
	ob_start();
	session_start();
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<script type="text/javascript" src="jquery-1.6.1.min.js"></script>
<title>CRMS</title>
<link rel="shortcut icon" href="image/qb_ico.gif">
<!-- Some function -->
<script type="text/javascript">
	function getsec()
	{
		$.ajax({
			url: 'sec.php',
			type: 'POST',
			data: {
				//UsrID: $("input[name='Usrid']").attr('value'),
				//UsrPW: $("input[name='Usrpwd']").attr('value'),
			},
			error: function(xhr) {
				alert('Ajax request failure');
			},
			success: function(result) {
				switch (result) {
				case "error":
					document.location.href = "notfound.php";
					break;
				case "nid":
					$('div.message').html("Please enter your username");
					break;
				case "npd":
					$('div.message').html("Please enter your password");
					break;
			
				default:
					$('div.message').html(result);
					break;
				}
			},
		});
	}
	$(document).ready(function(){
		$("ul#sec li a").click(function(event){
			event.preventDefault();
			var action = $(this).html();
			
			var pageList = {
					"[使用者列表]" 	: "userList.php",
					"[新增使用者]" 	: "adduser.php",
					"[編輯使用者]" 	: "",
					"[刪除使用者]" 	: "deluser.php",
					"[器材列表]"   	: "",
					"[新增器材]"   	: "addequiv.php",
					"[編輯器材]"	: "",
					"[刪除器材]"	: ""			
			};
			$.ajax({
				url  : pageList[action],
				statusCode : {
					200 : function(res){
						$("div#datamsg").html(res);
					}
					404 : 
						function(res){
						$("div#datamsg").html("Page Not Found");
					}
				}
			});
			
		
		});
	
	});
	
	
	
</script>
<style type="text/css">
	ul#div1 li{
		top:		50px;
		left:		200px;	
		width:		100px;
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
		
		<div>
			<ul id="div1">
				<li><a STYLE="text-decoration: none" id="mng" href="">[管理]</a></li>
				<li><a STYLE="text-decoration: none" id="sys" href="">[系統]</a></li>
			</ul>
		</div>
		
		<div align=center>
			<ul id="sec">
				<li><a STYLE="text-decoration: none" href="">[使用者列表]</a></li>
				<li><a STYLE="text-decoration: none" href="">[新增使用者]</a></li>
				<li><a STYLE="text-decoration: none" href="">[編輯使用者]</a></li>
				<li><a STYLE="text-decoration: none" href="deluser.php">[刪除使用者]</a></li>
				<li><a STYLE="text-decoration: none" href="">[器材列表]</a></li>
				<li><a STYLE="text-decoration: none" href="addequiv.php">[新增器材]</a></li>
				<li><a STYLE="text-decoration: none" href="">[編輯器材]</a></li>
				<li><a STYLE="text-decoration: none" href="">[刪除器材]</a></li>
			</ul>
		</div>
		
		<div id="datamsg">
			
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