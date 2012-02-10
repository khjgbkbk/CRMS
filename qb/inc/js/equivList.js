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
		var id = $(this).parents("tr").find("td:eq(1)").html();
		$.ajax({
			url:'androidMain.php/equipment/' + id,
			type:'DELETE',
			dataType:'json',
			statusCode:{
				200:function(){
					$(this).parents("tr").remove();
				}
			}
		});
	});
}
function edit()
{
	$('div#ctr tbody td input[id=edit]').click(function()
	{
		var cfm = confirm("確定要修改嗎?");
		if( cfm == false )
		{	
			return;
		}
		var editname = $(this).parents("tr").find("td:eq(2)").html();
		var editplace = $(this).parents("tr").find("td:eq(6)").html();
		var editid = $(this).parents("tr").find("td:eq(1)").html();
		var editprice = $(this).parents("tr").find("td:eq(4)").html();
		var data = {
			"name": editname,
			"dorm": editplace,
			"id": editid,
			"price": editprice
		};
		var link = "equivEdit.php";
		$.ajax({
			url  : 'androidMain.php/equipment/',
			type: 'PUT',
			dataType : 'json',
			data: {
				data:$.toJSON(data)
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
		return;
		
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
						$('div#ctr tbody').append('<tr><td><img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl='+v["id"]+'&choe=UTF-8&chld=h"/></td><td>'+v["id"]+'</td><td>'+htmlspecialchars(v["name"])+'</td><td>'+v["building"]+'</td><td>'+v["price"]+'</td><td>'+v["date"]+'</td><td class="hid">'+v["dorm"]+'</td><td id="btn"><input type="button" id="edit" value="編輯"></td><td id="btn"><input type="button" id="dele" value="刪除"></td></tr>');
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
	edit();
	select();
})