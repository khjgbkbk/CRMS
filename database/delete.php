<?php
	session_start();
?>

<?php
	if($_SESSION['username'] != null){
		echo "<form name=\"form\" method=\"post\" action=\"delete_finish.php\">";
		echo "ID to remove : <input type=\"text\" name=\"id\" /> <br>";
		echo "<input type=\"submit\" name=\"button\" value=\"Remove\" />";
		echo "</form>";
	}else{
		echo 'You are not authorized!';
		echo '<meta http-equiv=REFRESH CONTENT=2;url=index.html>';
	}
?>


