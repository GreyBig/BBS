<?php
echo file_get_contents("index.php");

$filepath = "readme.text";
$var = "12432154";

$ret = file_put_contents($filepath, $var);

var_dump($ret);