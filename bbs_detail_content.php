<?php
include('mysql/conn.php');
// 帖子详情页

if(!isset($_GET['plate_id']) || !isset($_GET['id']))
{
    echo '请传入plate和id';
}
// 连接数据库
$conn = new Conn();

// 查询文章
$sql = "SELECT * FROM tb_bbs_detail WHERE id=".$_GET['id'];
$res = mysqli_query($conn->connect(),$sql);
$ret = mysqli_fetch_array($res);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes" />
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
    html, body {
        height: 100%;
    }

    .footer {
        margin-top: 100px;
        background-color: #34495e;
        height: 50px;
        width: 100%;
        text-align: center;
        line-height: 50px;
        color: white;
    }
</style>
<body>
<div class="container">
    <div class="row clearfix">
        <div class="col-md-12 column">
            <h2 style="font-weight: bold"><?php echo $ret['title'] ?></h2>
            <div style="margin-top: 20px">
                <span style="color: #bdc3c7"><?php echo $ret['time'] ?></span> <span style="color: #3498db"><?php echo $ret['author'] ?></span>
            </div>
            <hr style="margin: 10px 0;">
            <p style="text-indent:2em"><?php echo $ret['content'] ?></p>
            <div  style="margin-top: 30px">
            <table class="table">

                <h4>网友评论</h4>
                <?php
                // 分页
                // 当前页
                $currentpage = $_GET['page'];
                // 每页显示多少条
                $everycount = 5;
                $selectStr = "SELECT * FROM tb_bbs_rely WHERE bbs_id=".$_GET['plate_id']." order by time DESC";
                $ret = mysqli_query($conn->connect(), $selectStr);
                $num = mysqli_num_rows($ret); // 总条数
                $totalpage = ceil($num/$everycount);

                $sql = "SELECT * FROM tb_bbs_rely WHERE bbs_id=".$_GET['plate_id']." LIMIT " . $currentpage*$everycount.",". $everycount;

                $res = mysqli_query($conn->connect(), $sql);
                if($num > 0)
                {
                    while($dataArray = mysqli_fetch_array($res))
                    {
                        echo "<tr>";
                        echo "<td style='color:#3498db; font-weight: bold; '>".$dataArray["author"]."</td>";
                        echo "<td>".$dataArray["content"]."</td>";
                        echo "<td>".$dataArray["time"]."</td>";
                        echo "</tr>";
                    }
                }
                ?>

            </table>
                <!--分页-->
                <div class="container" style="margin-top: -20px;">
                    <div class="row clearfix">
                        <div class="col-md-12 column">
                            <ul class="pagination">

                                <?php
                                if($currentpage == 0) {
                                    echo "<li><a class=\"page\" href=\"bbs_detail_content.php?plate_id=".$_GET['plate_id']."&id=".$_GET['id']."&page=".($currentpage)."\">Prev</a></li>";
                                } else {
                                    echo "<li><a class=\"page\" href=\"bbs_detail_content.php?plate_id=".$_GET['plate_id']."&id=".$_GET['id']."&page=".($currentpage-1)."\">Prev</a></li>";
                                }
                                ?>
                                <?php

                                    for ($i=1; $i<=$totalpage; $i++)
                                    {
                                        //echo "<a class=\"page\" href=\"bbs_detail_content.php?plate_id=".$_GET['plate_id']."&id=".$_GET['id']."&page=".($currentpage+1)."\">下一页</a>";
                                        echo "<li><a href=\"bbs_detail_content.php?plate_id=".$_GET['plate_id']."&id=".$_GET['id']."&page=".($i-1)."\">$i</a></li>";
                                    }
                                ?>

                                <?php
                                    if($currentpage == $totalpage-1) {
                                        echo "<li><a class=\"page\" href=\"bbs_detail_content.php?plate_id=".$_GET['plate_id']."&id=".$_GET['id']."&page=".($totalpage-1)."\">Next</a></li>";
                                    } else {
                                        echo "<li><a class=\"page\" href=\"bbs_detail_content.php?plate_id=".$_GET['plate_id']."&id=".$_GET['id']."&page=".($currentpage+1)."\">Next</a></li>";
                                    }
                                ?>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <form action="bbs_detail_comment.php?plate_id=<?php echo $_GET['plate_id'] ?>&id=<?php echo $_GET['id']?>" role="form" method="post">
                <div class="form-group">
                    <h4>发布评论</h4>
                    <textarea name="comment" class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-default">提交</button>
            </form>
        </div>
    </div>
</div>

<footer class="footer" >
    <span>Posted by: GreyBig <a href="mailto:someone@example.com">someone@example.com</a></span>
</footer>
</body>
</html>
