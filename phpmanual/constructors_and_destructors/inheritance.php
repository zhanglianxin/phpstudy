<?php

/*
 * Example #1 Inheritance Example
 * http://php.net/manual/en/language.oop5.inheritance.php#example-193
 */

class foo
{
    public function printItem($string)
    {
        echo "Foo: " . $string . PHP_EOL . "<br>";
    }

    public function printPHP()
    {
        echo "PHP is great." . PHP_EOL . "<br>";
    }
}

class bar extends foo
{
    public function printItem($string)
    {
        echo "Bar: " . $string. PHP_EOL . "<br>";
    }
}

$foo = new foo();
$foo->printItem("baz");
$foo->printPHP();
$bar = new bar();
$bar->printItem("baz");
$bar->printPHP();
?>
