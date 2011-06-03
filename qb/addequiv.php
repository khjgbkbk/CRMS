<?php
	ob_start();
	session_start();
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<script type="text/javascript" src="jquery-1.2.6.js"></script>
<script type="text/javascript">
	function send()
	{
		if( $("input[name='Equivname']").attr('value') == "" )
		{
			$('div.message').html('請輸入器材名稱!');
			return;
		}
		if( $("input[name='Equivplace']").attr('value') == "" )
		{
			$('div.message').html('請輸入器材所在位置!');
			return;
		}
		if( $("input[name='Equivid']").attr('value') == "" )
		{
			$('div.message').html('請輸入器材的編號!');
			return;
		}
		$.ajax({
			url: 'addequivto.php',
			type: 'POST',
			data: {
				addEquivName: 	$("input[name='Equivname']").attr('value'),
				addEquivPlace: 	$("input[name='Equivplace']").attr('value'),
				addEquivId: 	$("input[name='Equivid']").attr('value'),
				addEquivPrice: 	$("input[name='Equivprice']").attr('value'),
			},
			dataType: "json",
			error: function(xhr) {
				alert('Ajax request failure');
			},
			success: function(result) {
				switch (result) {
				case "noname":
					$('div.message').html("Please enter the Name");
					break;
				case "noplace":
					$('div.message').html("Please enter the Place !!");
					break;
				case "noid":
					$('div.message').html("Please enter the ID !!");
					break;
				case "success":
					alert('Successed !!');
					document.location.href = "./";
					break;
				case "fail":
					alert('Failed !!');
					$('input[name="Equivname"]').attr({value:''}); 
					$('input[name="Equivplace"]').attr({value:''}); 
					$('input[name="Equivid"]').attr({value:''});
					$('input[name="Equivprice"]').attr({value:''});
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
	var KEY_ENTER = 13;
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
<body bgcolor="#EBF5FF"  link="1C19FF" vlink="1C19FF">
<?php
if(isset($_SESSION["loginid"]) && isset($_SESSION["loginpwd"]))
{
?> 
		<div align='center'>
			<h1>CRMS::SERVER.AddEquivment</h1>
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
		
		<br>
		<div align="center">
			<table style="border: 5px dotted rgb(109, 2, 107); " align="center" cellPadding="10" frame="border">
			<tbody>
			<tr>
				<td>
					Name:
				</td>
				<td>
					<input type="text" name="Equivname">
				</td>
			</tr>
			<tr>
				<td>
					Place:
				</td>
				<td>
					<input type="text" name="Equivplace">
				</td>
			</tr>
			<tr>
				<td>
					ID:
				</td>
				<td>
					<input type="text" name="Equivid">
				</td>
			</tr>
			<tr>
				<td>
					Price:
				</td>
				<td>
					<input type="text" name="Equivprice">
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