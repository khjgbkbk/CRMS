<?php
	echo "<div align='center'>";
	echo "<h1>Hello ".htmlspecialchars($_POST['Uid'])."</h1>";
	echo "Your password is ".htmlspecialchars($_POST['Upd'])."<br/>";
	echo "Correct?<br/>";
	echo "Unfortunately, this Website is still building...<br/>";
	echo "<a href='/CRMS/'>Log out</a>";
	echo "</div>";
?>