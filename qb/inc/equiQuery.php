<?php
function showDataMsg(){
?>
<script type="text/javascript"  src="jquery.webcamqrcode.min.js"></script>
<script type="text/javascript"><?php include('inc/js/equiQuery.js'); ?></script>

查詢器材
<br><br>
<div align="center">
	<table style="border: 5px dotted rgb(109, 2, 107); " align="center" cellPadding="10" frame="border">
	<tbody>
	<tr>
		<td>請輸入編號:</td>
		<td><input type="text" name="Equivid"></td>
	</tr>
	<tr>
		<td>或是掃描:</td>
		<td><div style="width: 350px; height: 350px;" id="qrcodebox">
</div>
<input type="button" value="Start" id="btn_start" /> 
<input type="button" value="Stop" id="btn_stop" />
<p>
Last QRCode value: <span id="qrcode_result">none</span>
</p></td>
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

</div>
<?php
}
?>