<?php
    # 创建数据库和表

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
        $query = "CREATE DATABASE ".$db;
        // 创建数据库
        if (mysql_query($query)) {
            echo "Database created.<br>";

            // 选择当前数据库
            mysql_select_db($db, $con);

            $query = "CREATE TABLE persons(PID int(4) NOT NULL AUTO_INCREMENT, FirstName varchar(15), LastName varchar(15), Age int(10), PRIMARY KEY(PID))";
            // 创建表
            if (mysql_query($query)) {
                echo "Table created.<br>";
            } else {
                echo "Error creating table: ".mysql_error();
            }
        } else {
            echo "Error creating database: ".mysql_error();
        }
    }

    // 关闭连接
    $result = mysql_close($con);
    $retVal = ($result) ? "Close succeed!<br>" : "Close failed!<br>";
    echo $retVal;
?>
