<?php
	session_start();
?>

<?php
	include("mysql_connect.php");

	if($_SESSION['username'] != null){
		$id = $_SESSION['username'];
		$sql = "SELECT * FROM ".$db_shadow." where name='$id'";
		$result = mysql_query($sql);
		$row = mysql_fetch_row($result);

		echo "<form name=\"form\" method=\"post\" action=\"update_finish.php\">";
		echo "ID : <input type=\"text\" name=\"id\" disabled value=\"$row[1]\" />(此項目無法修改) <br>";
		echo "Password : <input type=\"password\" name=\"password1\" value=\"$row[2]\" /> <br>";
		echo "Renter passord : <input type=\"password\" name=\"password2\" value=\"$row[2]\" /> <br>";
		echo "<input type=\"submit\" name=\"button\" value=\"Submit\" />";
		echo "</form>";
	}else{
		echo 'You should not be in this page!';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=index.html>';
	}
?>
