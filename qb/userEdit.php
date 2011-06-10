<?php
ob_start();
session_start();
if(isset($_SESSION["loginid"]) && isset($_SESSION["loginpwd"]))
{
?>
<!-- 將資料送出 -->
<script type="text/javascript">
	function send()
	{
		if( $("input[name='prePwd']").attr('value') == "" )
		{
			$('div#message').html('請輸入密碼!');
			return;
		}
		if( $("input[name='prePwd']").attr('value') != '<?php echo $_SESSION["loginpwd"]; ?>' )
		{
			$('div#message').html('密碼輸入錯誤!');
			return;
		}
		$.ajax({
			url: 'userEditCfm.php',
			type: 'POST',
			data: {
				userid: '<?php echo $_SESSION["loginid"]; ?>',
				newPwd: $("input[name='newPwd']").attr('value')
			},
			dataType: "json",
			error: function(xhr) {
				alert('Ajax request failure');
			},
			success: function(result) {
				/* 將全部欄位清空 */
				$("div#ctr tbody input").each(function(){
					$(this).attr({value:''});
				});
				switch (result) {
				case "success" :
					alert('修改成功!');
					document.location.href = "./";
					break;
				default:
					$('div#message').html(result);
					break;
				}
			}
		});
	}
</script>

<script type="text/javascript">
	$(document).ready(function () 
	{
		$('#Send').click(function()
		{
			send();
		});
	});
</script>

<div align="center" id="ctr">
	更改使用者資料
	<br><br>
	<table style="border: 5px dotted rgb(109, 2, 107); " align="center" cellPadding="10" frame="border">
	<!-- Table Body -->
	<tbody>
	<tr>
		<td>舊密碼(必填):</td>
		<td><input type="password" name="prePwd"></td>
	</tr>
	<tr>
		<td>新密碼:</td>
		<td><input type="password" name="newPwd"></td>
	</tr>
	<tr>
		<td>新密碼確認:</td>
		<td><input type="password" name="newPwdconfirm"></td>
	</tr>
	</tbody>
	<!-- Table Foot -->
	<tfoot align="right">
		<td></td>
		<td><input type="button" value="送出" id="Send"></td>
	</tfoot>
	
	</table>
</div>

<br><br>
<div align="center" id="message">
</div>
	
<?php	
}
?>