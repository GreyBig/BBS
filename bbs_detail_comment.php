<?php
include('mysql/conn.php');
// 处理评论表单传过来的数据
session_start();
$server = "localhost";
$username = "root";
$password = "root";
$bbs_database = "bbs";

// 连接数据库
$conn = new Conn();

// 获取用户名
$author = $_SESSION['username'];
$comment = $_POST['comment'];
$plate_id = $_GET['plate_id'];
date_default_timezone_set('PRC');
$time = date('Y-n-j H:i:s',time());

$str = "INSERT INTO tb_bbs_rely VALUES (0, '$plate_id','$author', '$comment', '$time')";

$ret = mysqli_query($conn->connect(), $str);

if($ret == false) {
    echo "query error".mysqli_error($conn->connect());
    echo "<script> window.alert(\"评论失败！\");location.href=\"bbs_detail_content.php?plate_id=".$_GET['plate_id']."&id=".$_GET['id']."\"</script>";
} else {
    echo "<script> window.alert(\"评论成功！\");location.href=\"bbs_detail_content.php?plate_id=".$_GET['plate_id']."&id=".$_GET['id']."\"</script>";
}
