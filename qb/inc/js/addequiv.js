function send()
{
	if( $("input[name='Equivname']").attr('value') == "" )
	{
		alert('請輸入器材名稱!');
		return;
	}
	if( $("select[name='Equivplace']").attr('value') == "-1" )
	{
		alert('請選擇器材位置!');
		return;
	}
	$.ajax({
		url:'androidMain.php/equipment',
		type:'POST',
		dataType:'json',
		data:{
			data:$.toJSON({
				name: 	$("input[name='Equivname']").attr('value'),
				dorm: 	$("select[name='Equivplace']").attr('value'),
				price: 	$("input[name='Equivprice']").attr('value')
			})
		}
	
	})
	
	
	/*
	$.ajax({
		url: 'addequivto.php',
		type: 'POST',
		data: {
			addEquivName: 	$("input[name='Equivname']").attr('value'),
			addEquivPlace: 	$("select[name='Equivplace']").attr('value'),
			addEquivPrice: 	$("input[name='Equivprice']").attr('value')
		},
		dataType: "json",
		error: function(xhr) {
			alert('Ajax request failure');
		},
		success: function(result) {
			switch (result) {
			case "success":
				alert('新增成功 !');
				document.location.href = "./";
				break;
			case "fail":
				alert('新增失敗 !');
				$('div#ctr tbody input[type="text"]').each(function(){
					$(this).attr({value:''});
				});
				break;
			default:
				$('div.message').html(result);
				break;
			}
		}
	});
	*/
}

$(document).ready(function () 
{
	$('#Send').click(function()
	{
		send();
	});
});