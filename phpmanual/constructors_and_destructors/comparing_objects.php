<?php

/*
 * When using comparison operator (==), object variables are compared in a
 * simple manner, namely: Two object instances are equal if they have the same
 * attributes and values (values are compared with ==), and are instances of 
 * the same class.
 * When using the identity operator (===), object variables are identical if
 * and only if they refer to the same instance of the same class.
 *
 * Example #1 Example of object comparison in PHP 5
 * php.net/manual/en/language.oop5.object-comparison.php#language.oop5.traits.properties.conflicts
 */

function bool2str($bool)
{
    if ($bool === false) {
        return "FALSE";
    } else {
        return "TRUE";
    }
}

function compareObjects(&$o1, &$o2)
{
    echo "o1 == o2 : " . bool2str($o1 == $o2) . "\n<br>";
    echo "o1 != o2 : " . bool2str($o1 != $o2) . "\n<br>";
    echo "o1 === o2 : " . bool2str($o1 === $o2) . "\n<br>";
    echo "o1 !== o2 : " . bool2str($o1 !== $o2) . "\n<br>";
}

class Flag
{
    public $flag;

    function Flag($flag = true)
    {
        $this->flag = $flag;
    }
}

class OtherFlag
{
    public $flag;

    function OtherFlag($flag = true)
    {
        $this->flag = $flag;
    }
}

$o = new Flag();
$p = new Flag();
$q = $o;
$r = new OtherFlag();

echo "Two instances of the same class\n<br>";
echo "<pre>";
compareObjects($o, $p);
echo "</pre>";

echo "\n<br>Two references to the same instance\n<br>";
echo "<pre>";
compareObjects($o, $q);
echo "</pre>";

echo "\n<br>Instances of two different classes\n<br>";
echo "<pre>";
compareObjects($o, $r);
echo "</pre>";

?>
