<?php

// 处理add_bbs_plate传过来的数据

$server = "localhost";
$username = "root";
$password = "root";
$bbs_database = "bbs";
$bbs_table = "tb_user";

if($_POST["name"] == "")
{
    exit;
}

// 连接数据库
$conn = mysqli_connect($server,$username,$password,$bbs_database);
if(!$conn) {
    die('Could not connect: ' . mysqli_error());
} else {
    echo 'Success';
}

mysqli_set_charset($conn, "utf8");

$str = "insert into " $table. " values(0,'"$POST["name"]", '"$POST[""]"')";
$ret = mysqli_query($conn, $str);
if($ret == false) {
    echo "query error".mysqli_error($conn);
    header("refresh:2;url=add_bbs_plate.php");
} else {
    echo "<script> window.alert(\"插入成功! \")</script>";
}
