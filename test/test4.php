<?php
// 下载文件

$file = $_GET["file"];

//告诉浏览器这是一个文件流格式的文件
header("Content-type:applicatin/octem-stream");
//请求范围的度量单位
header("Accept-ranges:bytes");

// Content-disposition属性有两种类型:
// inline 和 attachment
// inline 直接将文件显示在页面
// attachment 弹出对话框让用户下载具体例子
header("Content-disposition:attachment;filename=".$file);
header("Accept-length:".filesize($file));

$f = @fopen($file, "r");

while($row = fread($f, 1024))
{
    echo $row;
}
fclose($f);