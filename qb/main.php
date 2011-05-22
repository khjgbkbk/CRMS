<?php
	ob_start();
	session_start();
?>
<html>
<head>
<title></title>
</head>
<body>
<?php
	if(isset($_SESSION["loginid"]) && isset($_SESSION["loginpwd"]))
	{
		echo "<div align='center'>";
		echo "<h1>Hello ".htmlspecialchars($_SESSION["loginid"])."</h1>";
		echo "Your password is ".htmlspecialchars($_SESSION["loginpwd"])."<br/>";
		echo "Correct?<br/>";
		echo "Unfortunately, this Website is still building...<br/>";
		echo "<a href='./logout.php'>Log out</a>";
		echo "</div>";
	}
?>
</body>
</html>