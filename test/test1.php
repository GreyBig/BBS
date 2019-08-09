<?php

// 递归操作

function my_scandir($dir)
{
    if(is_dir($dir) == false)
    {
        echo $dir."<br>";
        exit();
    }

    $files = scandir($dir);

    foreach($files as $file)
    {
        if($file == "." || $file == "..")
        {
            continue;
        }
        $new_dir = $dir."/".$file;
        if(is_dir($new_dir) == false) {
            echo $new_dir."<br>";
        } else {
            // 递归操作
            my_scandir($new_dir);
        }
    }
}

my_scandir($_GET["dir"]);

/*
$ret = opendir("./");


while($file = readdir($ret))
{
    echo $file."<br>";
}
closedir($ret);
*/

//$files = scandir("./");
//foreach( $files as $file)
//{
//    echo $file."<br>";
//}




