<?php
function showDataMsg(){
?>
<script type="text/javascript"><?php include('inc/js/addequiv.js');?></script>

新增器材
<br><br>
<div align="center" id="ctr">
	<table style="border: 5px dotted rgb(109, 2, 107); " align="center" cellPadding="10" frame="border">
	<tbody>
	<tr>
		<td>名稱:</td>
		<td><input type="text" name="Equivname"></td>
	</tr>
	<tr>
		<td>位置:</td>
		<td>
		<select type="text" name="Equivplace">
		<option value="-1">請選擇</option>
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
		</td>
	</tr>
	<tr>
		<td>價錢:</td>
		<td><input type="text" name="Equivprice"></td>
	</tr>
	</tbody>
	<tfoot>
	<tr>
		<td></td>
		<td align="right"><input type="button" value="送出" id="Send"></td>
	</tr>
	</tfoot>
	</table>
</div>
<div align="center" class="message">
</div>
<?php
}
?>
