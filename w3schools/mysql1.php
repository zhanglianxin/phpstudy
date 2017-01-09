<?php
    // 打开非持久的MySQL连接
    $con = mysql_connect("localhost:3307", "root", "usbw");
    if (!$con) {
        // 输出一条消息，并退出当前脚本 同exit()
        die("Could not connect: ".mysql_error());
    }

    // 创建数据库
    $sql = "CREATE DATABASE phptest";
    if (mysql_query($sql, $con)) {
        echo "Database created"."<br>";
    } else {
        echo "Error creating database: ".mysql_error()."<br>";
    }


    // 设置活动的数据库
    mysql_select_db("phptest", $con);

    // 创建表
    // 主键和自增字段
    $sql = "CREATE TABLE persons(
            personid int NOT NULL AUTO_INCREMENT,
            PRIMARY KEY (personid),
            firstname varchar(15), 
            lastname varchar(15), 
            age int)";
    mysql_query($sql, $con);

    // 插入数据
    $sql = "INSERT INTO persons (firstname, lastname, age)
            VALUES ('lianxin', 'zhang', 23)";
    mysql_query($sql);
    echo "1 record added"."<br>";

    $sql = "INSERT INTO persons (firstname, lastname, age)
            VALUES ('3', 'zhang', 24)";
    mysql_query($sql);
    echo "1 record added"."<br>";
    $sql = "INSERT INTO persons (firstname, lastname, age)
            VALUES ('4', 'li', 25)";
    mysql_query($sql);
    echo "1 record added"."<br>";
    $sql = "INSERT INTO persons (firstname, lastname, age)
            VALUES ('5', 'wang', 26)";
    mysql_query($sql);
    echo "1 record added"."<br>";


    // 查询数据
    $sql = "SELECT * FROM persons";
    $result = mysql_query($sql);
    echo "<table border='1'><tr><th>firstname</th><th>lastname</th></tr>";
    // 从结果集中取得一行作为关联数组，或数字数组，或二者兼有
    // 返回根据从结果集取得的行生成的数组，如果没有更多行则返回false
    while ($row = mysql_fetch_array($result)) {
        // echo $row['firstname']." ".$row['lastname']."<br>";
        echo "<tr><td>".$row['firstname']."</td><td>".$row['lastname']."</td><tr>";
    }
    echo "</table>";


    // 条件查询
    $sql = "SELECT * FROM persons WHERE firstname='4'";
    $result = mysql_query($sql);
    while ($row = mysql_fetch_array($result)) {
        echo $row['firstname']." ".$row['lastname']."<br>";
    }


    // 关闭非持久的MySQL连接
    mysql_close($con);
?>
