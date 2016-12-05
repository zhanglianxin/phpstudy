<?php
    # 从数据库中选取数据

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
        $query = "SELECT * FROM persons WHERE PID = 1";
        // 创建查询
        $result = mysql_query($query);
        // var_dump($result); // bool(false)

        /*{
            # Fetch a result row as an associative array, a numeric array, or both #
            // here is both
            $row = mysql_fetch_array($result); // array
//            $size = count($row);
//            var_dump($row); // array(8)
//            $row = mysql_fetch_array($result); // bool
//            var_dump($row); // bool(false)
            // FIXME NOT WORK
            while ($row = mysql_fetch_array($result)) {
                echo $row["FirstName"]." ".$row["LastName"]." ".$row["Age"]."<br>";
            }
            // XXX IT WORKS
            if (isset($row)) {
                echo $row[0]." ".$row[1]." ".$row[2]." ".$row[3]."<br>";
                echo $row["PID"]." ".$row["FirstName"]." ".$row["LastName"]." ".$row["Age"]."<br>";
            }
            // TODO think about why the mysql_fetch_array() can only execute once
        }*/

        {
            // var_dump($row = mysql_fetch_array($result)); // array(8)
            // FIXME it works
            while ($row = mysql_fetch_array($result)) {
                echo $row[0]." ".$row[1]." ".$row[2]." ".$row[3]."<br>";
                echo $row["PID"]." ".$row["FirstName"]." ".$row["LastName"]." ".$row["Age"]."<br>";
            }
        }
    }

    // 关闭连接
    $result = mysql_close($con);
    $retVal = ($result) ? "Close succeed!<br>" : "Close failed!<br>";
    echo $retVal;
?>