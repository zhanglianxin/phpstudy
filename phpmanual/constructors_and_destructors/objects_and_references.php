<?php

/*
 * A PHP reference is an alias, which allows two differenct varibles to write
 * to the same value. As of PHP 5, an object varible doesn't contain the object
 * itself as value anymore. It only contains an object identifier which allows
 * object accessors to find the actual object. When an object is sent by
 * argument, returned or assigned to another variable, the different variables
 * are not aliases: they hold a copy of the identifier, which points to the
 * same object.
 *
 * Example #1 References and Objects
 * http://php.net/manual/en/language.oop5.references.php#example-236
 */

class A
{
    public $foo = 1;
}

$a = new A();
/*
 * $a and $b are copies of the same identifier
 * ($a) = ($b) = <id>
 */
$b = $a;

$b->foo = 2;
echo $a->foo . "\n<br>"; // 2

$c = new A();
/*
 * $c and $d are references
 * ($c, $d) = <id>
 */
$d = &$c;

$d->foo = 2;
echo $c->foo . "\n<br>"; // 2

$e = new A();

function foo($obj)
{
    /*
     * ($obj) = ($e) = <id>
     */
    $obj->foo = 2;
}

foo($e);
echo $e->foo . "\n<br>"; // 2

?>
