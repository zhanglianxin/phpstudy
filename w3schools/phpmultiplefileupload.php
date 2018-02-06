<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>PHP 多文件上传</title>
</head>
<body>
<?php
    $allowed = ini_get('file_uploads');

    if ($allowed) {
        $maxFilesize = ini_get('upload_max_filesize');
        echo '<code>Maximum allowed size (' . $maxFilesize . ') for uploaded files.</code><hr style="width: 30%; margin-left: 0;">';
        $maxFileUploads = ini_get('max_file_uploads');
    } else {
        echo '<code>File uploads is disallowed!</code>';
    }
?>
    <form action="upload_multiple_file.php" method="post" enctype="multipart/form-data">
<?php
    for ($i = 0; $i < $maxFileUploads; $i++) {
        echo '<label for="file">Filename: </label>';
        echo '<input type="file" name="file' . $i .  '"><br><br>';
    }
?>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
