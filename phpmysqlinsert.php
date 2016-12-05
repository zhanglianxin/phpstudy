<?php
    # 向数据库表中插入新纪录

    // mysql_connect(server, username, password);
    $server = "localhost:3307";
    $username = "root";
    $password = "usbw";
    $con = mysql_connect($server, $username, $password);

    if (!$con) {
        die("Could not connect: ".mysql_error()."<br>");
    } else {
        echo "Connect success!<br>";

        $db = "my_db";

        // 选择当前数据库
        mysql_select_db($db, $con);

        $query = "INSERT INTO persons (FirstName, LastName, Age) VALUES ('Shinn', 'Cheung', '23')";
        // 插入记录
        $result = mysql_query($query);
        if ($result > 0) {
            echo "Insert ".$result." records.<br>";
        } else {
            echo "Error insert record: ".mysql_error();
        }
    }

    // 关闭连接
    $result = mysql_close($con);
    $retVal = ($result) ? "Close succeed!<br>" : "Close failed!<br>";
    echo $retVal;
?>
