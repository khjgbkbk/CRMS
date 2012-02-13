<?php
function showDataMsg(){

	include("../database/fList.php");
	$re = funcList(array("sort" => 'id'));
	if( $re["success"] == true )
	{
		$data = $re["data"];
?>

<!-- Functions -->
<script type="text/javascript"><?php include('inc/js/equivList.js');?></script>

<!-- CSS -->
<style type="text/css">
	div#ctr table{
		border: 5px dotted rgb(109, 2, 107);
		padding-top:   	9px; 
		padding-right:  9px; 
		padding-bottom: 9px; 
		padding-left:   9px;
	}
	div#ctr td{
		text-align:	center;
	}
	div#ctr td img{
		height:60px;
	}
	div#ctr td img:hover{
		height:300px;
	}
	div#ctr tbody td{
		width:		159px;
	}
	div#ctr tbody td#btn{
		width:		10px;
	}
	td.hid{
		display: 	none;
	}
</style>

<div align="center" id="hd">
器材列表
<select type="text" id="place">
<option value="-1">全部</option>
<?php 		
		include('../database/fBuilding.php');
		$location = funcBuilding(NULL);
		foreach( $location['data'] as $key )
		{
?>
			<option value="<?php echo $key['index']; ?>"><?php echo $key['building']; ?></option>
<?php
		}
?>
</select>
<br><br>
</div>
<div align="center" id="ctr">
	<table>
	<thead>
		<tr>
			<!--<td>QRcode</td>-->
			<td>編號</td>
			<td>名稱</td>
			<td>位置</td>
			<td>價錢</td>
			<td>加入時間</td>
			<td class="hid">00</td>
			<td id="btn">查詢</td>
			<td id="btn">刪除</td>
		</tr>
	</thead>
	<tbody>
<?php
		$row = count($data);
		for($i=0 ; $i<$row ; $i++)
		{
		require_once('../database/fGetQRCode.php');
		$Code = funcMkQRCodeData($data[$i]);
		
?>
	<tr id="<?php echo $i; ?>" >
		<!--<td><img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&choe=UTF-8&chld=h&chl=<?php echo  urlencode($Code['data'])?>"/></td>-->
		<td class="eqid"><?php echo htmlspecialchars ($data[$i]['id']	); ?></td>
		<td><?php echo htmlspecialchars ($data[$i]['name']	); ?></td>
		<td><?php echo htmlspecialchars ($data[$i]['building']	); ?></td>
		<td><?php echo htmlspecialchars ($data[$i]['price']	); ?></td>
		<td><?php echo htmlspecialchars ($data[$i]['date']	); ?></td>
		<td class="hid"><?php echo htmlspecialchars ($data[$i]['dorm']	); ?></td>
		<td id="btn"><a href="?m1=mng&m2=equiQuery&eqid=<?php htmlspecialchars ($data[$i]['id']	);?>"><input type="button" id="query" value="查詢"></a></td>
		<td id="btn"><input type="button" id="dele" value="刪除"></td>
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

