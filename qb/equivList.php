<?php
	ob_start();
	session_start();
?>
<!-- function send -->
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
<!-- click action -->
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

<?php
if(isset($_SESSION["loginid"]) && isset($_SESSION["loginpwd"]))
{
	include("../database/fList.php");
	$re = funcList(NULL);
	if( $re["success"] == true )
	{
		$data = $re["data"];
		$row = $re["row_size"];
		$col = $re["column_size"];
?>
<div align="center">
	<table style="border: 3px dotted rgb(109, 2, 107);">
	<tbody>
		<tr>
			<td>器材名稱</td>
			<td>器材位置</td>
			<td></td>
			<td>器材價錢</td>
			<td>器材編號</td>
		</tr>
<?php
		for($i=0 ; $i<$row ; $i++)
		{
?>
	<tr>
<?php
			for($j=0 ; $j<$col ; $j++)
			{
?>
		<td>
			<?php echo $data[$i][$j]; ?>
		</td>	
<?php
			}
?>
	</tr>
<?php
		}
	
?>
	</tbody>
	</table>
</div>

<?php
	}
}
?>

