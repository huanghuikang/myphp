<?php
include_once ("function/fileSystem.php");
include_once ("function/database.php");
if (empty($_POST)) {
    exit("���ύ�ı����ݳ���post_max_size!<br>");
}
//�ж�����������ȷ�������Ƿ���ͬ
$password = $_POST['password'];
$confirmPossword = $_POST['confirmPassword'];
if($password != $confirmPossword){
    exit("�����������ȷ�����벻��ȣ�");
}
$userName = $_POST['userName'];
$domain = $_POST['domain'];
$userName = $userName.$domain;
//�ж��û����Ƿ��ظ�
$userNameSQL = "select * from users where userName = '$userName'";
getConnect();
$resultSet = mysql_query($userNameSQL);
if(mysql_num_rows($resultSet) > 0) {
    exit("�û����ѱ�ռ�ã�����������û���");
}
$sex = $_POST['sex'];
if (empty($_POST['interests'])) {
    $interests = "";
} else {
    $interests = implode(";", $_POST['interests']);
}
$remark = $_POST['remark'];
$myPictureName = $_FILES['myPicture']['name'];
$registerSQL = "insert into users values(null,'$userName','$password','$sex','$interests','$myPictureName','$remark')";
if($message == "�ϴ��ɹ�"  || $mesage == "û���ϴ�") {
    mysql_query($registerSQL);
    $userID = mysql_insert_id();
    echo "ע��ɹ�<br>";
} else {
    exit("�û�ע��ʧ�ܣ�");
}
closeConnect();