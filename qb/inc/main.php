<?php
if(isset($_GET['m1'])){
	switch($_GET['m1']){
	case 'sys':
		include('inc/menuSys.php');
		break;
	case 'mng':
	default:
		include('inc/menuMag.php'); 
		break;
	}					
}else{
	include('inc/menuMag.php'); 

}



?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<script type="text/javascript" src="jquery-1.6.1.min.js"></script>
<script type="text/javascript" src="jquery.json-2.2.min.js"></script>
<title>CRMS</title>
<link rel="shortcut icon" href="image/qb_ico.gif">
<!-- Some function -->
<script type="text/javascript">
/*
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
	};*/
	$(document).ready(function(){
		$('#btn_logout').click(function(){
			$.ajax({url:'androidMain.php/logout'});
			return false;
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
					<?php echo htmlspecialchars($_SERVER['PHP_AUTH_USER']); ?>&nbsp&nbsp
				</td>
				<td>
					&nbsp&nbsp<a STYLE="text-decoration: none" id="btn_logout" href='./androidMain.php'>Log out</a>&nbsp&nbsp
				</td>
				</tbody>
			</table>
		</div>
		
		<div align=center>
			<ul id="fir">
				<li><a STYLE="text-decoration: none" id="mng" href="?m1=mng">[管理]</a></li>
				<li><a STYLE="text-decoration: none" id="sys" href="?m1=sys">[系統]</a></li>
			</ul>
		</div>
		
		<div align=center>
			<ul id="sec">
				<?php showMainMenu();?>
			</ul>
		</div>
		
		<br>
		<br>
		<div id="datamsg" align="center">
			<?php showDataMsg();?>
		</div>
</body>

</html>