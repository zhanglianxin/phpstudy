<?php
    $conn = mysql_connect("localhost", "root", "root");
    function myTest()
    {
        # code...
        // 函数内访问全局变量
        global $conn;
        // 数组中存储了所有的全局变量
        // 下标为变量名
        $GLOBALS['conn'];
        // 静态变量
        static $conn;
    }
?>
