<?php
	session_start();
?>

<?php
	include("mysql_connect.php");

	$id = $_POST['id'];
	$password1 = $_POST['password1'];
	$password2 = $_POST['password2'];

	if($id != null && $password1 != null && $password2 != null && $password1 == $password2){
		$sql = "insert into ".$db_shadow." (name, passwd) values ('$id', '$password1')";
		if(mysql_query($sql)){
			echo 'Sucess!';
			echo '<meta http-equiv=REFRESH CONTENT=2;url=index.html>';
        	}else{
			echo 'Failed!';
			echo '<meta http-equiv=REFRESH CONTENT=2;url=index.html>';
	        }
	}else{
		echo 'You do not have the right to view this page!';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=index.html>';
	}
?>
