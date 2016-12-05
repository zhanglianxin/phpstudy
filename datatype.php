<?php
    # 数据类型：字符串、整数、浮点数、逻辑、数组、对象、NULL
    
    // 整数类型
    $x = 1024;
    /*返回变量的数据类型和值*/
    var_dump($x); // int(1024)
    echo "<br>"; 
    
    // 浮点数
    $y = 1.0;
    var_dump($y); // float(1)
    echo "<br>"; 
    
    // 逻辑值
    $t = true;
    var_dump($t); // bool(true)
    echo "<br>"; 
    
    // 数组
    $a = array("a", "b", "c");
    var_dump($a);
    echo "<br>"; 

    $arr = array("a" => "red", "b" => "green");
    var_dump($arr);
    echo "<br>";
    /* foreach循环只适用于数组，并用于遍历数组中的每个键值对 */
    foreach ($arr as $value) {
        echo "$value ";
    }
    echo "<hr>"; 

    // 未定义的变量 NULL
    // var_dump($n);

    // 对象
    class Car
    {
        var $color;
        function Car($color = "green")
        {
            $this->color = $color;
        }
        function what_color()
        {
            return $this->color;
        }
    }

    function print_vars($obj) {
        foreach (get_object_vars($obj) as $prop => $value) {
            echo "$prop = $value\n";
        }
    }

    $herbie = new Car("white");
    echo "herbie: Properties<br>";
    print_vars($herbie);
    echo "<br>";

    // 字符串函数
    $str = "hellophp";
    echo "strlen(): ".strlen($str);
    echo "<br>";

    // 常量
    define("name", "zhanglianxin");
    echo name;
    echo "<br>";

    // 时间
    echo "now: ".date("Y-m-d H:i:s");
?>
<footer>© 2010-<?php echo date("Y")?></footer>
