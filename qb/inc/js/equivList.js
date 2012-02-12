function htmlspecialchars(string)  
{
	return $('<span>').text(string).html();
}
function dele()
{
	$('div#ctr tbody td input[id=dele]').click(function()
	{
		var cfm = confirm("確定要刪除嗎?");
		if( cfm == false )
		{	
			return;
		}
		var $tr = $(this).parents("tr");
		var id = $tr.find("td:eq(1)").html();
		
		$.ajax({
			url:'androidMain.php/equipment/' + id,
			type:'DELETE',
			dataType:'json',
			statusCode:{
				200:function(){
					$tr.remove();
				},
				404:function(){
					alert('Not Found');
				}
			}
		});
	});
}
function select()
{
	$('select#place').change(function(){
		var value = $(this).val();
		$('div#ctr tbody').html('');
		var url = 'androidMain.php/location/' + value;
		if(value == -1){
			url = 'androidMain.php/equipment/';
		}
		$.ajax({
			url: url,
			type: 'GET',
			dataType: "json",
			statusCode:{
				200:function(result) {
					$.each(result,function(i,v){
						$('div#ctr tbody').append(
						'<tr>' +
							'<td>'+v["id"]+'</td>' +
							'<td>'+v["building"]+'</td>' +
							'<td>'+v["price"]+'</td> '+
							'<td>'+v["date"]+'</td>'+
							'<td class="hid">'+v["dorm"]+'</td>' + 
							'<td id="btn"><a href="?m1=mng&m2=equiQuery&eqid='+ v['id'] +'"><input type="button" id="query" value="查詢"></a></td>' +
							'<td id="btn"><input type="button" id="dele" value="刪除"></td>' +
						'</tr>'
						);
					});
					dele();
					edit();
				}
			}
			
		});
		
	});
}
var KEY_ENTER = 13;
$(document).ready(function () 
{
	dele();
	select();
})