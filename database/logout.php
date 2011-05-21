<?php
	echo 'Logout......';
	header('WWW-Authenticate: Basic realm="My Realm"');
	header('HTTP/1.0 401 Unauthorized');
	echo '<meta http-equiv=REFRESH CONTENT=1;url=index.html>';
?>
