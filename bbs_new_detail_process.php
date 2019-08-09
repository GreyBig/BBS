<?php
include('mysql/conn.php');
session_start();
// 获取用户名
$author = $_SESSION['username'];
// 连接数据库
$conn = new Conn();
if(!$conn) {
    die('Could not connect: ' . mysqli_error($conn->connect()));
}

if(!isset($_GET['plate_id']) || !isset($_POST['title']) || !isset($_POST['content']) )
{
    echo '请传入plate_id、title、content';
}

// 获取传过来的数据
$plate_id = $_GET['plate_id'];
$title = $_POST['title'];
$content = $_POST['content'];
// 发布时间
date_default_timezone_set('PRC');
$time = date('Y-n-j H:i:s',time());

$sql = "INSERT INTO tb_bbs_detail (plate_id,author, title, content, time) VALUES ('$plate_id', '$author', '$title', '$content', '$time')";
$res = mysqli_query($conn->connect(), $sql);
if ($res == TRUE) {
    echo "发布成功";
    header("location:bbs_new_detail.php?plate_id=".$plate_id); //跳转至注册页面
} else {
    echo "发布成功" ;
    echo "Error: " . $sql . "<br>" . mysqli_error($conn->connect());
    return false;
}




