
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
		$.ajax({
			url: 'eEditTo.php',
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
				case "success":
					alert('Successed !!');
					document.location.href = "./";
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
	})
	$(document).keydown(function(event){ 
		//如果按 enter
		if(event.keyCode == KEY_ENTER)
		{
			send();
		}
	});
</script>


修改器材資訊
<br><br>
<div align="center">
	<table style="border: 5px dotted rgb(109, 2, 107); " align="center" cellPadding="10" frame="border">
	<tbody>
	<tr>
		<td>名稱:</td>
		<td><input type="text" name="Equivname" value="<?php echo $_POST['name'];?>"></td>
	</tr>
	<tr>
		<td>位置:</td>
		<td><input type="text" name="Equivplace" value="<?php echo $_POST['place'];?>"></td>
	</tr>
	<tr>
		<td>編號:</td>
		<td><input type="text" name="Equivid" value="<?php echo $_POST['id'];?>"></td>
	</tr>
	<tr>
		<td>價錢:</td>
		<td><input type="text" name="Equivprice" value="<?php echo $_POST['price'];?>"></td>
	</tr>
	<tr>
		<td></td>
		<td align="right"><input type="button" value="送出" id="Send"></td>
	</tr>
	</tbody>
	</table>
</div>