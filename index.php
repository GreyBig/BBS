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
        <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
    <div class="container">
        <div class="" style="float: right; margin-top: 20px;">
            <a href="upload.php" ><img style="  border-radius: 30px;width:65px;height:65px; " src="/images/logo.png" alt="用户头像"></a>

        </div>
        <div style="margin-top: 30px;">
            <h3 style="display:inline; font-family: 新宋体;">主题列表页</h3>
            <a style="margin-left: 50px;font-size:18px;font-family: 新宋体; text-decoration:none;" href="add_bbs_plate.html" >添加</a>
            <a style="margin-left: 50px;font-size:18px;font-family: 新宋体; text-decoration:none;" href="./muma/index.html" >马马</a>
            <a style="margin-left: 50px;font-size:18px;font-family: 新宋体; text-decoration:none;" href="delete_login.php" >退出</a>
        </div>

        <hr style="margin-top:5px;">

        <div class="row" >
            <div class="col-md-10 col-md-offset-1"
                 style="background-color: #ffffff;box-shadow:
          1px -1px 1px #bdc3c7,  -1px 1px 1px #bdc3c7;">
                <table style="margin-top: 15px;" class="table table-bordered" >

                    <thead>
                    <tr>
                        <td width="15%">主题及板块</td>
                        <td width="55%">板块描述</td>
                        <td width="15%">创建时间</td>
                    </tr>
                    </thead>

                    <?php
                    $selectStr = "SELECT * FROM tb_bbs_plate";
                    $ret = mysqli_query($conn->connect(), $selectStr);

                    if(mysqli_num_rows($ret) > 0)
                    {
                        while($dataArray = mysqli_fetch_array($ret))
                        {
                            echo "<tbody>";
                            echo "<tr>";
                            echo "<td>".$dataArray["subject"]."<br>"."<a href=\"bbs_plate_list.php?plate_id=".$dataArray['id']."&page=0"."\">".$dataArray["name"]."</a>";
                            echo "<td>".$dataArray["description"]."</td>";
                            echo "<td>".$dataArray["time"]."</td>";
                            echo "</tr>";
                            echo "<tbody/>";
                        }
                    }
                    ?>
                </table>
            </div>

        </div>
    </div>

    </body>
</html>