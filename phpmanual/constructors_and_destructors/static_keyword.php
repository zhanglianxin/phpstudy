<?php

/*
 * A property declared as static cannot be accessed with an instantiaed
 * class object (though a static method can).
 *
 * Because static methods are callable without an instance of the object
 * created, the pseudo-variable <code>$this</code> is not available 
 * inside the method declared as static.
 *
 * Example #1 Static method example
 * http://php.net/manual/en/language.oop5.static.php#example-197
 */

class Foo
{
    public static function aStaticMethod()
    {
        // ...
    }
}

Foo::aStaticMethod();

$classname = "Foo";
$classname::aStaticMethod(); // As of PHP 5.3.0

/*
 * Static properties cannot be accessed through the object 
 * using the arrow operator ->.
 *
 * Like any other PHP static variable, static properties may only
 * be initialized using a literal or constant before PHP 5.6;
 * expressions are not allowed. In PHP 5.6 and later, the same rules
 * apply as const expressions: some limited expressions are possible,
 * provided they can be evaluated at compile time.
 *
 * As of PHP 5.3.0, it's possible to reference the class using a variable.
 * The variable's value cannot be a keyword (e.g. <code>self</code>, 
 * <code>parent</code> and <code>static</code>).
 *
 * Example #2 Static property example
 * http://php.net/manual/en/language.oop5.static.php#example-198
 */

class Foo1
{
    public static $my_static = "foo1";

    public function staticValue()
    {
        return self::$my_static;
    }
}

class Bar extends Foo1
{
    public function fooStatic()
    {
        return parent::$my_static;
    }
}

print Foo1::$my_static . "\n<br>";

$foo = new Foo1();
print $foo->staticValue();
// Strict Standards: Accessing static property Foo1::$my_static as non static 
// Notice: Undefined property: Foo1::$my_static
print $foo->my_static . "\n<br>"; // 对象访问成员变量
print $foo::$my_static . "\n<br>"; // 对象访问静态属性

$classname = "Foo1";
print $classname::$my_static . "\n<br>";

print Bar::$my_static . "\n<br>";
$bar = new Bar();
print $bar->fooStatic() . "\n<br>";

?>
