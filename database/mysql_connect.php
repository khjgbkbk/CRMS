<?php
$db_server = "140.117.182.16";
$db_user = "";
$db_passwd = "";

$db_name = "crms_db";
$db_shadow = "shadow";

mysql_connect($db_server, $db_user, $db_passwd) or die("Database connection failure");

mysql_query("SET NAMES utf8");

mysql_select_db($db_name) or die("Unable to link to database");

$sql = "insert into shadow values(1,'kohsiangyu','admin',0)";
mysql_query($sql);

?> 
