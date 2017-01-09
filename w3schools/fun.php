<?php
    # 函数
    
    function familyName($fname, $year)
    {
        echo "$fname Zhang. Born in $year <br>";
    }

    familyName("Lianxin", "1993");

    // 默认参数值
    function setHeight($minheight=50)
    {
        echo "The height is : $minheight <br>";
    }
    setHeight(80);
    setHeight(); // 使用默认值

    function sum($x, $y)
    {
        $z = $x + $y;
        return $z;
    }

    echo "1 + 1 = ".sum(1, 1)."<br>";
?>
