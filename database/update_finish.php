<?php
	session_start();
?>

<?php
	include("mysql_connect.php");

	$id = $_POST['id'];
	$password1 = $_POST['password1'];
	$password2 = $_POST['password2'];

	if($_SESSION['username'] != null && $password1 != null && $password2 != null && $password1 == $password2){
		$id = $_SESSION['username'];

		$sql = "update ".$db_shadow." set passwd=$password1 where name='$id'";
		if(mysql_query($sql)){
			echo 'Success!';
			echo '<meta http-equiv=REFRESH CONTENT=2;url=member.php>';
		}else{
			echo 'Failed!';
			echo '<meta http-equiv=REFRESH CONTENT=2;url=member.php>';
		}
	}else{
		echo 'You are not authorized!';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=index.html>';
	}
?>
