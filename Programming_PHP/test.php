<?php
    $a = 0;
    echo isset($a).'<br>';
    echo (isset($a) == true ? 'true' : 'false').'<br>';

    $b = "";
    echo isset($b).'<br>';
    echo (isset($b) == true ? 'true' : 'false').'<br>';

    $c = "isset";
    echo isset($c).'<br>';
    echo (isset($c) == true ? 'true' : 'false').'<br>';

    $d = "";
    echo isset($d).'<br>';
    echo (isset($d) == true ? 'true' : 'false').'<br>';

    $e = false;
    echo isset($e).'<br>';
    echo (isset($e) == true ? 'true' : 'false').'<br>';

    $f = null;
    echo $f.'<br>';
    echo $f.'<br>';

    // echo 108. 1.2;
    echo 108 . 1.2;
    echo '<br>';
    echo 108.1. 2;
    echo '<br>';

    echo "3.14 Pies2" * 2;
    echo '<br>';
    echo "Pies2" * 2;
    echo '<br>';

    $n = 5;
    echo "There were $n ducks." . "<br>";
    echo 'There were $n ducks.' . '<br>';

    $arr = ['a', 'b', 'c', 'd', 'e', 'f', 'g'];
    foreach ($arr as $key => $value) {
        echo $key . ' ' . $value . '<br>';
    }
    echo '-------<br>';

    $arrlength = count($arr);
    for ($i = 0; $i < $arrlength; $i++) { 
        echo $i . ' ' . $arr[$i] . '<br>';
    }
    echo '-------<br>';

    for ($i = 0; $i < $arrlength; ++$i) { 
        echo $i . ' ' . $arr[$i] . '<br>';
    }
    echo '-------<br>';

    echo decbin(1024) . '<br>';
    echo bindec(10000000000) . '<br>';

    if (true) {
        echo 'true' . '<br>';
    }
    if (false) {
        echo 'false' . '<br>';
    }

    $a = [1, 2, 3, 4];
    echo (int)$a . '<br>';
    @print (string)$a . '<br>';

    function outer($a)
    {
        function inner($b)
        {
            echo "there $b";
        }
        echo "$a, hello ";
    }
    echo '-------<br>';

    outer("well");
    inner("reader");
    echo '<br>-------<br>';

    $a = 3;
    function foo()
    {
        $a += 2;
    }
    foo();
    echo $a;
    echo '<br>-------<br>';

    $family = array("Fred", "Wilma");
    $family[] = "Pebbles";
    print_r($family);
    echo "<br>";

    $person = array('name' => "Fred");
    $person[] = "Wilma";
    print_r($person);
    echo "<br>";

    $r = range(0, 10);
    print_r($r);
    echo "<br>";

    $scores = array(5, 10);
    $paded = array_pad($scores, 5, 0);
    print_r($scores);
    echo "<br>";
    print_r($paded);
    echo "<br>";
    echo '-------<br>';

    $addresses = array("spam@cyberpromo.net", "abuse@example.com");
    // var_dump(each($addresses));
    // echo "<br>";
    // var_dump(each($addresses));
    // echo "<br>";
    // var_dump(each($addresses));
    // echo "<br>";
    reset($addresses);
    while (list($key, $value) = each($addresses)) {
        echo "{$key} is {$value}<br>";
    }
?>
