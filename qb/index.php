<?php
	ob_start();
	session_start();
	function get_browser_version()
	{
        $browser_version = array("Chrome","MSIE","Firefox","Opera","Safari","Netscape");
        $i = 0;
        while($i < count($browser_version))
        {
                if(strstr($_SERVER["HTTP_USER_AGENT"],$browser_version[$i])) {
                        return $browser_version[$i];
                }
                $i++;
        }
        return "Unknow";
	}
	if(get_browser_version() == "MSIE")
	{
		header('Location: ./iegodead.html');
	}
	
	if(isset($_SESSION["loginid"]) && isset($_SESSION["loginpwd"]))
	{
		header('Location: ./main.php');
		exit;
	}
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<script type="text/javascript" src="jquery-1.2.6.js"></script>
<!-- 偵測頁面大小 -->
<script type="text/javascript">
	var viewportwidth;
	var viewportheight;
	function getWindowsSize(){
		// the more standards compliant browsers (mozilla/netscape/opera/IE7) use window.innerWidth and window.innerHeight
		if (typeof window.innerWidth != 'undefined')
		{
			viewportwidth = window.innerWidth,
			viewportheight = window.innerHeight
		}
	
		// IE6 in standards compliant mode (i.e. with a valid doctype as the first line in the document)
		else if (typeof document.documentElement != 'undefined' && typeof document.documentElement.clientWidth !='undefined' && document.documentElement.clientWidth != 0)
		{
			viewportwidth = document.documentElement.clientWidth,
			viewportheight = document.documentElement.clientHeight
		}
	
		// older versions of IE
		else
		{
			viewportwidth = document.getElementsByTagName('body')[0].clientWidth,
			viewportheight = document.getElementsByTagName('body')[0].clientHeight
		}
	}
</script>
<!-- 調整圖片大小 -->
<script type="text/javascript">
	function ReImgSize($img) 
	{
		getWindowsSize();  // 重新偵測視窗大小
		var width = viewportwidth;	//視窗寬
		var height = viewportheight;	//視窗高
		height = height>350 ? height : 350 ;
		var oWidth = $img.width(); //取得圖片的實際寬度
		var oHeight = $img.height(); //取得圖片的實際高度
		if( width/height > 1920/1080 )
		{
			if( width > height)
			{
				// 以寬度為基準
				$img.width(width); 
				$img.height(oHeight * width / oWidth);
			}
			else
			{
				// 以高度為基準
				$img.height(height);
				$img.width(oWidth * height / oHeight);
			}
		}
		else // width/height <= 1920/1080
		{
			if( width > height*1920/1080 )
			{
				// 以寬度為基準
				$img.width(width); 
				$img.height(oHeight * width / oWidth);
			}
			else
			{
				// 以高度為基準
				$img.height(height);
				$img.width(oWidth * height / oHeight);
			}
		}
		$img.parent("div").height(height);
		$img.parent("div").width(width);
	}
</script>
<!-- Some function -->
<script type="text/javascript">
	function send()
	{
		$.ajax({
			url: 'login.php',
			type: 'POST',
			data: {
				UsrID: $("input[name='Usrid']").attr('value'),
				UsrPW: $("input[name='Usrpwd']").attr('value'),
			},
			dataType: "json",
			error: function(xhr) {
				alert('Ajax request failure');
			},
			success: function(result) {
				switch (result) {
				case "nid":
					$('div.message').html("Please enter your username");
					break;
				case "npd":
					$('div.message').html("Please enter your password");
					break;
				case "success":
					$("form[name=kakusu] input[name=Uid]").val( $("input[name='Usrid']").attr('value') ),
					$("form[name=kakusu] input[name=Upd]").val( $("input[name='Usrpwd']").attr('value') ),
					document.kakusu.submit();
					break;
				case "noaccess":
					document.location.href = "notfound.php";
					break;
				default:
					$('div.message').html(result);
					break;
				}
			},
		});
	}
	function myrefresh()
	{
		window.location.reload();
	}
</script>
<!-- CSS 圖片、文字設定 -->
<style type="text/css">
	.titlefont{
		font-size: 30pt;
		<!--font-family:"Times New Roman","標楷體","細明體",monospace;-->
	}
	.myButton {
		background:url(image/like.gif) no-repeat;
		cursor:pointer;
		width: 40px;
		height: 20px;
		border: none;
	}
	.content {
		font-size: 11pt;
	}
	#loadingImg{
		position:absolute;
		width:300px;
		top:0px;
		left:50%;
		margin-left:-120px;
		text-align:center;
		padding:7px 0 0 0;
		font:bold 11px Arial, Helvetica, sans-serif;
	}
</style>
<!-- (document).ready function -->
<script type="text/javascript">
	var KEY_ENTER = 13;
	$(document).ready(function () 
	{
		$('#send').click(function()
		{
			send(); 
		});
		$('#clean').click(function()
		{
			$('input[name="Usrid"]').attr({value:''}); 
			$('input[name="Usrpwd"]').attr({value:''}); 
		});
		$(window).resize(function()
		{
			ReImgSize($("#bgImg img"));
		});
		$('#show_pass').click(function()
		{
			if(this.checked)
			{
		        $("#Usrpwd2").val($("#Usrpwd").val());
				$("#Usrpwd").hide();
				$("#Usrpwd2").show();
			}
			else
			{
				$("#Usrpwd").val($("#Usrpwd2").val());
				$("#Usrpwd2").hide();
				$("#Usrpwd").show();
			}
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
<title>CRMS</title>
<link rel="shortcut icon" href="image/qb_ico.gif">
</head>
<body bgcolor="#E6D4F8" >
	<div id="bgImg" style="position:absolute; left:0px; top:0px; z-index:-1; overflow:hidden;">
		<img id="my_bg" src="image/bg.png" onload=ReImgSize($(this))></img>
	</div>
	<div class="titlefont" align="center" style="z-index: 3;">
		CRMS::Server
	</div>
	<br/>
	<br/>
	<br/>
	<table style="border: 5px dotted rgb(109, 2, 107); width: 300px;" align="center" cellPadding="10" frame="border" >
		<tbody class="content">
		<tr align="center">
			<td>Username <input type="text" name="Usrid"></td>
		</tr>
		<tr align="center">
			<td>
				Password 
				<input type="password" value="" name="Usrpwd" id="Usrpwd" style="ime-mode: disabled; display: inline;">
				<input type="text" value="" name="Usrpwd2" id="Usrpwd2" style="ime-mode: disabled; display: none;">
				<br>
				<div align="right">
					<input type="checkbox" id="show_pass">show password
				</div>
			</td>
		</tr>
		<tr align="right">
			<td>
				<input type="button" class="myButton" value="" id="send">
				<!--<input type="button" value="Cancel" id="clean">-->
			</td>
		</tr>
		</tbody>	
	</table>
	<br/>
	<div align="center" style="font-size: 9pt; color: #3937FF;">
		僕と契約して○○○○になってよ！
	</div>
	<br>
	<div align="center" class="message">
	</div>
	<div class="s">
		<form style="display:none"	method="post" name="kakusu" action="main.php">
				<input type="hidden" name="Uid" value="">
				<input type="hidden" name="Upd" value="">
		</form>
	</div>
</body>
</html>