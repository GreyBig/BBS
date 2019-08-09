
<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>用户头像</title>
</head>
<body>
<form action="upload_process.php" method="post" enctype="multipart/form-data" onsubmit="return check()">
    <table border="1">
        <tr><th colspan="2">用户头像</th></tr>
        <tr><td>请上传用户头像</td><td><input type="file" name="file" id="file"/></td></tr>
        <tr><td>
                <input type="submit" name="submit" value="提交"/>
                <input type="reset" value="重置"/>
            </td></tr>
    </table>
</form>
</body>
<script>

</script>
</html>
