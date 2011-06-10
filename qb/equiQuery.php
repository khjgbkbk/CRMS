<?php
ob_start();
session_start();
if(isset($_SESSION["loginid"]) && isset($_SESSION["loginpwd"]))
{
?> 

<script type="text/javascript">
	function send()
	{
		if( $("input[name='Equivid']").attr('value') == "" )
		{
			$('div#message').html('請輸入編號!');
			return;
		}
		$.ajax({
			url: 'eQueryTo.php',
			type: 'POST',
			data: {
				Id: 	$("input[name='Equivid']").attr('value'),
			},
			dataType: "json",
			error: function(xhr) {
				alert('Ajax request failure');
			},
			success: function(result) {
				switch (result) {
				case "fail":
					$('div#message').html('Not found');
					break;
				default:
					$('div#message').html('<table style="border: 5px dotted rgb(109, 2, 107); " align="center" cellPadding="10" frame="border"><tbody><tr>		<td>名稱</td><td>位置</td><td>編號</td><td>價錢</td><td>加入時間</td></tr><tr>  <td>'+result["name"]+'</td><td>'+result["building"]+'</td><td>'+result["id"]+'</td><td>'+result["price"]+'</td><td>'+result["date"]+'</td></tr></tbody></table>');
					break;
				}
			}
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
	});
</script>

查詢器材
<br><br>
<div align="center">
	<table style="border: 5px dotted rgb(109, 2, 107); " align="center" cellPadding="10" frame="border">
	<tbody>
	<tr>
		<td>請輸入編號:</td>
		<td><input type="text" name="Equivid"></td>
	</tr>
	<tr>
		<td></td>
		<td align="right"><input type="button" value="送出" id="Send"></td>
	</tr>
	</tbody>
	</table>
</div>
<br><br>
<div align="center" id="message">

</div>

<?php	
}
?>
