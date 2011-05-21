<?php
	//if(isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] == "http://mkfsn.cdpa.nsysu.edu.tw:8080/CRMS/")
	if(true)
	{  
		echo "<div align='center'>";
		echo "<h1>Hello ".htmlspecialchars($_POST['Uid'])."</h1>";
		echo "Your password is ".htmlspecialchars($_POST['Upd'])."<br/>";
		echo "Correct?<br/>";
		echo "Unfortunately, this Website is still building...<br/>";
		echo "<a href='/CRMS/'>Log out</a>";
		echo "</div>";
	}/*
	else
	{
		include("notfound.php");
		echo "<p>The requested URL /CRMS/main.php was not found on this server.</p>";
	}*/
?>