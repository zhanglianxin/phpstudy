<?php
    $txt1 = "呵呵";
    $txt2 = "呵呵你妹夫";
    $txt3 = array("呵呵你一脸", "我是你大爷", "嗯，大爷好");

    echo "<h1>echo输出</h1>";
    echo $txt1."<br>";
    echo "$txt1<br>";
    echo "txt2: $txt2<br>";
    echo "访问数组中的元素: {$txt3[2]}";

    print "<h1>print输出</h1>";
    print $txt1."<br>";
    print "$txt1<br>";
    print "txt2: $txt2<br>";
    print "访问数组中的元素: {$txt3[2]}";    

    /*
    echo 和 print 之间的差异：
    echo - 能够输出一个以上的字符串
    print - 只能输出一个字符串，并始终返回 1
    提示：echo 比 print 稍快，因为它不返回任何值。
    */
?>
