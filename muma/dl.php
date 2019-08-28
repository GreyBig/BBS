<?php

$pass = $_POST['password'];

if($pass !== 'admin'){
    echo "<script language=\"javascript\"> //JavaScript脚本标注
alert(\"上联：山石岩下古木枯\");//在页面上弹出上联
</script>";
    header("location:index.html");
} else {
    echo 'success';
    header("location:control.html");
}


