<?php
	session_start();
?>

<?php
	include("mysql_connect.php");

	$id = $_POST['id'];

	if($_SESSION['username'] != null){
		$sql = "delete from `$db_shadow` where name='$id'";
		if(mysql_query($sql)){
			echo 'Success!';
			echo '<meta http-equiv=REFRESH CONTENT=2;url=member.php>';
		}else{
			echo 'Failed!';
			echo '<meta http-equiv=REFRESH CONTENT=2;url=member.php>';
		}
	}else{
		echo 'You are authorized!';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=index.html>';
	}
?>
