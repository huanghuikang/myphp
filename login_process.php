<?php
include_once("function/database.php");
//$username = $_POST['userName'];
//$password = $_POST['password'];
$username = addslashes($_POST['userName']);
$password = addslashes($_POST['password']);
getConnect();
$loginSQL = "select * from users where userName='$username' and password='$password'";
echo $loginSQL;
$resultLogin = mysql_query($loginSQL);
if(mysql_num_rows($resultLogin) > 0) {
    echo "µÇÂ¼³É¹¦";
} else {
    echo "µÇÂ¼Ê§°Ü";
}
closeConnect();