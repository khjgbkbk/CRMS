function send()
	{
	if( $("input[name='Equivid']").attr('value') == "" )
	{
		$('div#message').html('請輸入編號!');
		return;
	}
	$.ajax({
		url: 'androidMain.php/equipment/' + $("input[name='Equivid']").attr('value'),
		type: 'GET',
		dataType: "json",
		statusCode:{
			200:function(result){
				$('div#message').html('<table style="border: 5px dotted rgb(109, 2, 107); " align="center" cellPadding="10" frame="border"><tbody><tr>		<td>名稱</td><td>位置</td><td>編號</td><td>價錢</td><td>加入時間</td></tr><tr>  <td>'+result["name"]+'</td><td>'+result["building"]+'</td><td>'+result["id"]+'</td><td>'+result["price"]+'</td><td>'+result["date"]+'</td></tr></tbody></table>');
			
			
			}
		
		}
	});
}
var KEY_ENTER = 13;
$(document).ready(function () 
{
	$('#Send').click(function()
	{
		send();
	});
	$('#qrcodebox').WebcamQRCode({
		onQRCodeDecode: function( p_data ){
				$('#qrcode_result').html( p_data );
		}
	});
	
	$('#btn_start').click(function(){
		$('#qrcodebox').WebcamQRCode().start();
	});
	
	$('#btn_stop').click(function(){
		$('#qrcodebox').WebcamQRCode().stop();
	});
});