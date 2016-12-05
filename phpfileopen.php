<?php
    # PHP 文件打开/读取/关闭

    # file: webdictionary.txt #


    /* fopen(FILENAME, MODE) */
    $file = fopen("webdictionary.txt", "r") or die("Unable to open file!");
    /* fread(FILEVAR, MAXBYTES) */
    echo fread($file, filesize("webdictionary.txt"));
    /* fclose(FILEVAR) */
    fclose($file);
    echo "<br><br>";

    /* 循环按行读取未知长度的文件 */
    $file = fopen("webdictionary.txt", "r") or die("Unable to open file!");
    // 判断是否到达文件结束
    while (!feof($file)) {
        // 读取单行
        echo fgets($file)."<br>";
    }
    fclose($file);

    /* 循环按字符读取未知长度的文件 */
    $file = fopen("webdictionary.txt", "r") or die("Unable to open file!");
    // 判断是否到达文件结束
    while (!feof($file)) {
        // 读取单字符
        echo fgetc($file);
    }
    fclose($file);
?>
