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
			dataType:'json'
		});
		
		
		/*
		$.ajax({
			url: 'delequiv.php',
			type: 'POST',
			data: {
				ID: id
			},
			dataType: "json",
			error: function(xhr) {
				alert('Ajax request failure');
			},
			success: function(result) {
				switch (result) {
				case "success":
					break;
				default:
					alert(result);
					break;
				}
			},
		});*/
		$(this).parents("tr").remove();
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
			"place": editplace,
			"id": editid,
			"price": editprice
		};
		var link = "equivEdit.php";
		equiEdit(link, data);
		return;
		
	});
}
function select()
{
	$('select#place').change(function(){
		var value = $(this).val();
		$('div#ctr tbody').html('');
		$.ajax({
			url: 'equivListBy.php',
			type: 'POST',
			data: {
				place: value,
			},
			dataType: "json",
			error: function(xhr) {
				alert('Ajax request failure');
			},
			success: function(result) {
				switch (result) {
				case "fail":
					break;
				default:
					$.each(result,function(i,v){
						$('div#ctr tbody').append('<tr><td><img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl='+v["id"]+'&choe=UTF-8&chld=h"/></td><td>'+v["id"]+'</td><td>'+htmlspecialchars(v["name"])+'</td><td>'+v["building"]+'</td><td>'+v["price"]+'</td><td>'+v["date"]+'</td><td class="hid">'+v["dorm"]+'</td><td id="btn"><input type="button" id="edit" value="編輯"></td><td id="btn"><input type="button" id="dele" value="刪除"></td></tr>');
					});
					dele();
					edit();
					break;
					
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