<?php
include('mysql/conn.php');

// 连接数据库
$conn = new Conn();
if(!$conn) {
    die('Could not connect: ' . mysqli_error($conn->connect()));
}
mysqli_set_charset($conn->connect(), "utf8");
if(!isset($_GET['plate_id']) || !isset($_GET['page']))
{
    echo '请传入plate和page';
}

$plate_id = $_GET['plate_id'];


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes" />
        <title>帖子列表</title>
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
        .page {
            text-decoration: none;
            margin-left: 20px;
        }
    </style>
    <body>
        <table border="1" cellspacing="0" cellpadding="8" align="center">
            <tr>
                <td class="title" colspan="3">
                    <span>帖子列表</span>
                    <a style="color:white;" class="page" href="bbs_new_detail.php?plate_id=<?php echo  $plate_id; ?>">发布新帖</a>
                    <a style="color:white;" class="page" href="index.php">返回</a>
                </td>
            </tr>
            <tr>
                <td width="65%">标题</td>
                <td width="20%">内容</td>
                <td width="15%">作者</td>
            </tr>
            <?php
                // 分页
                // 当前页
                $currentpage = $_GET['page'];
                // 每页显示多少条
                $everycount = 5;
                $selectStr = "SELECT * FROM tb_bbs_detail WHERE plate_id=".$_GET['plate_id'];
                $ret = mysqli_query($conn->connect(), $selectStr);
                // 总条数
                $count = mysqli_num_rows($ret);
                // 总页数
                $totalpage = ceil($count/$everycount);
                $sql = "SELECT * FROM tb_bbs_detail WHERE plate_id=".$_GET['plate_id']." LIMIT " . $currentpage*$everycount.",". $everycount;
                $res = mysqli_query($conn->connect(), $sql);
                if(mysqli_num_rows($res) > 0)
                {
                    while($dataArray = mysqli_fetch_array($res))
                    {
                        echo "<tr>";
                        echo "<td><a href=\"bbs_detail_content.php?plate_id=".$_GET['plate_id']."&id=".$dataArray['id']."&page=0"."\">".$dataArray["title"]."</a></td>";
                        echo "<td>".$dataArray["author"]."</td>";
                        echo "<td>".$dataArray["time"]."</td>";
                        echo "</tr>";
                    }
                    echo "<tr>";
                        echo "<td>";

                        echo "<a class=\"page\" href=\"bbs_plate_list.php?plate_id=".$_GET['plate_id']."&page=0"."\">首页</a>";
                        if($currentpage == 0) {
                            echo "<a class=\"page\" href=\"bbs_plate_list.php?plate_id=".$_GET['plate_id']."&page=".($currentpage)."\">上一页</a>";
                        } else {
                            echo "<a class=\"page\" href=\"bbs_plate_list.php?plate_id=".$_GET['plate_id']."&page=".($currentpage-1)."\">上一页</a>";
                        }
                        if($currentpage == $totalpage-1) {
                            echo "<a class=\"page\" href=\"bbs_plate_list.php?plate_id=".$_GET['plate_id']."&page=".($totalpage-1)."\">下一页</a>";
                        } else {
                            echo "<a class=\"page\" href=\"bbs_plate_list.php?plate_id=".$_GET['plate_id']."&page=".($currentpage+1)."\">下一页</a>";
                        }
                        echo "<a class=\"page\" href=\"bbs_plate_list.php?plate_id=".$_GET['plate_id']."&page=".($totalpage-1)."\">尾页</a>";
                        echo "<span class=\"page\">共".$totalpage."页</span>";
                        echo "<span class=\"page\">第".($currentpage+1)."页</span>";

                        echo "</td>";
                    echo "</tr>";
                }
            ?>

        </table>

    </body>
</html>
