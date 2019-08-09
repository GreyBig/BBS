<?php
include('mysql/conn.php');

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

// 连接数据库
$conn = new Conn();
$sql = "INSERT INTO tb_user (username, password, create_time) VALUES ('$name', '$pwd', '$create_time')";
$res = mysqli_query($conn->connect(), $sql);
if ($res == TRUE) {
    echo "注册成功";
    header("location:login.html"); //跳转至注册页面
} else {
    echo "注册失败" ;
    echo "Error: " . $sql . "<br>" . mysqli_error($conn->connect());
    return false;
}

