<?php
include("authorized.php");
//include("mysql_connect.php");

echo '<a href="logout.php">Logout</a>  <br><br>';

        echo '<a href="register.php">New</a>    ';
        echo '<a href="update.php">Edit</a>    ';
        echo '<a href="delete.php">Delete</a>  <br><br>';
    
//        $sql = "SELECT * FROM member_table";
//        $result = mysql_query($sql);
//        while($row = mysql_fetch_row($result))
//        {
//                 echo "$row[0] - 名字(帳號)：$row[1], " . 
//                 "電話：$row[3], 地址：$row[4], 備註：$row[5]<br>";
//        }
?>
