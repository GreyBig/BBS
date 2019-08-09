<?php
include('mysql/conn.php');
// session判断
session_start();
if(!isset($_SESSION['username']) || $_SESSION['username'] == ""){
    echo 'No Session';
    header("refresh:3;url=login.html");
}

$conn = new Conn();

// COOKIE验证
// if($_COOKIE["haha"] == ""){
//     echo "<h1></h1>";
//     echo "cookie=".$_COOKIE["haha"];
//     header("refresh:3;url=index.html");
// } else {
//     echo "当前浏览器没有cookie! ";
//     header("refresh:3;url=login.html");
// }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes" />
        <title>首页</title>
    </head>
    <style>
        table{
            width: 85%;
            margin-top: 10px;
        }
        .title{
            background-color: #0DA3FA;
            font-size: 17px;
            color: white;
        }
    </style>
    <body>
        <table border="1" cellspacing="0" cellpadding="8" align="center">
            <tr>
                <td class="title" colspan="3">

                    <a href="upload.php" ><img  style="width: 50px; height: 50px;" src="/images/logo.png"  alt="用户头像"></a>
                        论坛列表
                    <a style="margin-left: 100px; color: white; font-size:18px; text-decoration:none;" href="add_bbs_plate.html" >添加</a>
                </td>
            </tr>
            <tr>
                <td width="15%">主题及板块</td>
                <td width="55%">板块描述</td>
                <td width="15%">创建时间</td>
            </tr>
            <?php
                $selectStr = "SELECT * FROM tb_bbs_plate";
                $ret = mysqli_query($conn->connect(), $selectStr);

                if(mysqli_num_rows($ret) > 0)
                {
                    while($dataArray = mysqli_fetch_array($ret))
                    {
                        echo "<tr>";
                        echo "<td>".$dataArray["subject"]."<br>"."<a href=\"bbs_plate_list.php?plate_id=".$dataArray['id']."&page=0"."\">".$dataArray["name"]."</a>";
                        echo "<td>".$dataArray["description"]."</td>";
                        echo "<td>".$dataArray["time"]."</td>";
                        echo "</tr>";
                    }
                }
            ?>
        </table>
    </body>
</html>