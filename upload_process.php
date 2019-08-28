<?php
if ($_FILES["file"]["error"] > 0) {
    echo $_FILES["file"]["error"];
} else {
    $fileName = $_SERVER['DOCUMENT_ROOT'].'/images/'.$_FILES['file']['name'];
    $file = move_uploaded_file($_FILES["file"]["tmp_name"], "images/logo.png");

    var_dump($_FILES["file"]["tmp_name"]);
    echo $_FILES["file"]["name"]."<br/>";
    echo $_FILES["file"]["type"]."<br/>";
    echo $_FILES["file"]["size"] / 1024;
    echo "<br/>";
    echo "The position is :"."/images/logo.png";

}
?>