<?php
header("content-tye:text/html;charset=utf-8");

// 验证用户名密码是否存在
if($_POST['username'] == '' || $_POST['password'] == '' || $_POST['repassword'] == '')
{
    return false;
}
if($_POST['password'] !== $_POST['repassword'] )
{
    echo '两次输入密码不相同';
    return false;
}
$name = $_POST['username'];
$pwd = md5($_POST['password']);
// 创建时间
date_default_timezone_set('PRC');
$create_time = date('Y-n-j H:i:s',time());

$server = "localhost";
$username = "root";
$password = "root";
$bbs_database = "bbs";
$bbs_table = "tb_user";

// 连接数据库
$conn = mysqli_connect($server,$username,$password,$bbs_database);
if(!$conn) {
    die('Could not connect: ' . mysqli_error($conn));
} else {
    echo 'Success';
}
$sql = "INSERT INTO tb_user (username, password, create_time) VALUES ('$name', '$pwd', '$create_time')";
$res = mysqli_query($conn, $sql);
if ($res == TRUE) {
    echo "注册成功";
    header("location:login.html"); //跳转至注册页面
} else {
    echo "注册失败" ;
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    return false;
}

