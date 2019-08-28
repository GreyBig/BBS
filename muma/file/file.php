<?php

$filename = $_POST['filename'];
$content = $_POST['content'];
$file = fopen($filename, "a");
fwrite($file, $content);
fclose($file);
?>

<script>
    alert("Create file success")
</script>
<script>
    window.location.href='../control.html';
</script>
