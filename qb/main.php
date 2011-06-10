<?php
ob_start();
session_start();
if(isset($_SESSION["loginid"]) && isset($_SESSION["loginpwd"]))
{
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<script type="text/javascript" src="jquery-1.6.1.min.js"></script>
<title>CRMS</title>
<link rel="shortcut icon" href="image/qb_ico.gif">
<!-- Some function -->
<script type="text/javascript">
	function bindUlSec(){
		$("ul#sec li a").click(function(event){
			$("div#datamsg").html();
			event.preventDefault();
			var action = $(this).html();
			var pageList = {
					"[使用者列表]" 	: "userList.php",
					"[新增使用者]" 	: "adduser.php",
					"[更改資料]" 	: "userEdit.php",
					"[器材列表]"   	: "equivList.php",
					"[新增器材]"   	: "addequiv.php",
					"[查詢器材]"	: "equiQuery.php"
			};
			$.ajax({
				url  : pageList[action],
				statusCode : {
					200 : function(res){
							$("div#datamsg").html(res);
						},
					404 : 
						function(res){
							$("div#datamsg").html("Page Not Found");
						}
				}
			});
		});
	
	};
	function equiEdit(link, ask){
		$.ajax({
			url  : link,
			type: 'POST',
			data: {
				name: ask['name'],
				place: ask['place'],
				id: ask['id'],
				price: ask['price']
			},
			statusCode : {
				200 : function(res){
						$("div#datamsg").html(res);
					},
				404 : 
					function(res){
						$("div#datamsg").html("Page Not Found");
					}
			}
		});
	};
	$(document).ready(function(){
		bindUlSec();
		$("ul#fir li a").click(function(event){
			event.preventDefault();
			$("div#datamsg").html("");
			var actionL = $(this).html();
			var comList = {
				"[管理]": "magList.php",
				"[系統]": "sysList.php"
			};
			$.ajax({
				url  : comList[actionL],
				statusCode : {
					200 : function(res){
							$("ul#sec").html(res);
							bindUlSec();
						}
				}
			});
		});
	});
</script>

<!-- CSS -->
<style type="text/css">
	ul#fir li{
		top:		50px;
		width:		100px;
		display:	inline;
	}
	ul#sec li{
		display:	inline;
	}
	div#info td#namae{
		color: #FF0000;
	}
</style>
</head>
<body bgcolor="#EBF5FF"  link="1C19FF" vlink="1C19FF">
		<div align="center">
			<h1>CRMS::SERVER.Main</h1>
		</div>
	
		<div align='right' id="info">
			<table style="position:absolute; right:13px; top:13px; z-index:0; overflow:hidden; border: 3px dotted rgb(109, 2, 107);">
				<tbody>
				<td>
					&nbsp&nbsp Welcome
				</td>
				<td id="namae">
					<?php echo htmlspecialchars($_SESSION["loginid"]); ?>&nbsp&nbsp
				</td>
				<td>
					&nbsp&nbsp<a STYLE="text-decoration: none" href='./logout.php'>Log out</a>&nbsp&nbsp
				</td>
				</tbody>
			</table>
		</div>
		
		<div align=center>
			<ul id="fir">
				<li><a STYLE="text-decoration: none" id="mng" href="">[管理]</a></li>
				<li><a STYLE="text-decoration: none" id="sys" href="">[系統]</a></li>
			</ul>
		</div>
		
		<div align=center>
			<ul id="sec">
				<li><a STYLE="text-decoration: none" href="">[器材列表]</a></li>
				<li><a STYLE="text-decoration: none" href="">[新增器材]</a></li>
				<li><a STYLE="text-decoration: none" href="">[查詢器材]</a></li>
			</ul>
		</div>
		
		<br>
		<br>
		<div id="datamsg" align="center">
			
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