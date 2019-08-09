<?php


class Conn
{

    public function connect()
    {
        // 连接数据库
        $link = mysqli_connect("localhost","root","root","bbs");
        mysqli_set_charset($link, "utf8");
        if(!$link) {
            die('Could not connect: ' . mysqli_error($link));
        }
        return $link;
    }



}
