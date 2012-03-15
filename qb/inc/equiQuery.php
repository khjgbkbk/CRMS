<?php
function showDataMsg(){
?>
<script type="text/javascript"  src="llqrcode.js"></script>
<script type="text/javascript"><?php include('inc/js/equiQuery.js'); ?></script>
<script type="text/javascript">
	$(document).ready(function(){
		<?php
			if(isset($_GET['eqid'])){
		?>		
		//	$('#Equivid').val('<?php echo $_GET['eqid']?>');
		//	$('#Send').click();
		<?php
			}
		?>
	});

</script>
查詢器材
<br><br>
<div align="center">
	<table style="border: 5px dotted rgb(109, 2, 107); " align="center" cellPadding="10" frame="border">
	<tbody>
	<tr>
		<td>請輸入編號:</td>
		<td><input id="Equivid" type="text" name="Equivid"></td>
	</tr>
	<tr>
		<td>或是掃描:</td>
		<td>
			<div id="outdiv"></div>
			<canvas id="qr-canvas" width="0" height="0"></canvas>
			<div>
				<input type="button" value="Start" id="btn_start" /> 
				<input type="button" value="Stop" id="btn_stop" />
				SCANRATE:<span id="lbl_scanrate"></span>
				<input type="button" value="&lt;=" id="btn_renewScanrate"/>
				<input type="input" id="inp_scanrate"/>
			</div>
		</td>
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
<?php
if(isset($_GET['eqid'])){
	require_once('../database/fQuery.php');
	$res = funcQuery(array('id'=>$_GET['eqid']));
	if($res['success'] == false){
		echo 'Not Found';
	}else{
		print_r($res['data']);
?>
		<div id="infoBox">
		<table>
		<tbody>
			<tr>
				<td>物品編號</td>
				<td id="itemId"><?php echo $res['data']['id'];?></td>
			</tr>
			<tr>
				<td>QRCODE</td>
				<td><img id="qrcode" src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&choe=UTF-8&chld=h&chl=<?php echo  urlencode($res['data']['id'])?>"/></td>
			</tr>
			<tr>
				<td>物品名稱</td>
				<td id="itemName"><?php echo $res['data']['name']?></td>
			</tr>
			<tr>
				<td>位置</td>
				<td id="building"><?php echo $res['data']['building']?></td>
			</tr>
			<tr>
				<td>價錢</td>
				<td id="price"><?php echo $res['data']['price']?></td>
			</tr>
			<tr>
				<td colspan="2">其他</td>
			</tr>
			<tr>
				<td colspan="2" id='other'><?php echo $res['data']['other'] ?></td>
			</tr>
		</tbody>	
		</table>
		
		
		
		
		</div>
		
		
		
<?php		
	}
}

?>
</div>
<?php
}
?>