<?php
include('mysql/conn.php');
// 利用session保存
session_start();
$_SESSION['username'] = $_POST['username'];
$_SESSION['password'] = $_POST['password'];

// 验证用户名密码是否存在
if($_POST['username'] == '' || $_POST['password'] == ''){
    return false;
}

$name = $_POST['username'];
$pwd = $_POST['password'];
$pwd = md5($pwd);

$conn = new Conn();
// 验证用户名密码是否正确
$sql = mysqli_query($conn->connect(),"select * from tb_user where username ='{$name}' and password = '{$pwd}' ");

//查询数据库中的用户名和密码 并返回集合
$row = mysqli_fetch_assoc($sql); //取其中一行

if ($row > 0) { //判断是否存在
    echo "欢迎'{$username}'再次登录";
    header("location:index.php");
} else {
    echo "，您还没有账号，请先进行注册！！！";

    // 用cookie保存
    //setcookie('haha', 'hahahahhahhjsoisaj');

    header("location:register.html"); //跳转至注册页面
}

