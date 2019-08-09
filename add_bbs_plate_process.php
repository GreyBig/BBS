<?php
// 处理add_bbs_plate传过来的数据
include('mysql/conn.php');

if($_POST["name"] == "")
{
    exit;
}
$name = $_POST["name"];
$subject = $_POST["subject"];
$description = $_POST["description"];
// 创建时间
date_default_timezone_set('PRC');
$create_time = date('Y-n-j H:i:s',time());

// 连接数据库
$conn = new Conn();

$str = "INSERT INTO tb_bbs_plate VALUES (0,'$subject','$name', '$description', '$create_time')";
//var_dump($str);die;
$ret = mysqli_query($conn->connect(), $str);

if($ret == false) {
    echo "query error".mysqli_error($conn->connect());
    header("refresh:2;url=add_bbs_plate.html");
} else {
    echo "<script> window.alert(\"插入数据成功！\");location.href=\"add_bbs_plate.html\"</script>";
}
