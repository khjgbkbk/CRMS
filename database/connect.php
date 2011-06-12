<?php
//include("fLogin.php");
//include("fRegister.php");
//include("fUnregister.php");
include("fNew.php");
//include("fDelete.php");
include("fList.php");
//include("fUsers.php");
//include("fEdit.php");
//include("fPassword.php");
//include("fBuilding.php");

$user['username'] = $_POST['id'];
$user['password'] = $_POST['password'];

//$sql = "SELECT * FROM ".$db_shadow." where name = '$name'";
//$result = mysql_query($sql) or die(mysql_error());
//$row = mysql_fetch_row($result);
echo $user['username']."<br>";
echo $user['password']."<br>";

$obj['name'] = "switch";
$obj['dorm'] = "3";
$obj['id'];
$obj['price'] = 1234567;

//print_r( json_encode(funcBuilding($obj)) );
print_r( json_encode(funcList($obj)) );
print_r( json_encode(funcNew($obj)) );

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
