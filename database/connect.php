<?php
include("fLogin.php");

$user['username'] = $_POST['id'];
$user['password'] = $_POST['password'];

//$sql = "SELECT * FROM ".$db_shadow." where name = '$name'";
//$result = mysql_query($sql) or die(mysql_error());
//$row = mysql_fetch_row($result);
echo $user['username']."<br>";
echo $user['password']."<br>";

print_r( funcLogin($user));

//if($name != null && $password != null && $row[1] == $name && $row[2] == $password)
//{
//        echo 'Login Authorized!';
//        echo '<meta http-equiv=REFRESH CONTENT=1;url=member.php>';
//}
//else
//{
//        echo 'Login failure';
//        echo '<meta http-equiv=REFRESH CONTENT=1;url=index.html>';
//}
?>
