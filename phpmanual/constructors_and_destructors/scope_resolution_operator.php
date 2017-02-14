<?php

/*
 * Example #1 :: from outside the class definition
 * http://php.net/manual/en/language.oop5.paamayim-nekudotayim.php#example-194
 */

class MyClass
{
    const CONST_VALUE = "A constant value";
}

$classname = "MyClass";
echo $classname::CONST_VALUE . "<br>";

echo MyClass::CONST_VALUE . "<br>";

echo "-----<br>";

/*
 * Three special keywords <code>self</code>, <code>parent</code> and 
 * <code>static</code> are used to access properties or methods 
 * from inside the class definition.
 *
 * Example #2 :: from inside the class definition
 * http://php.net/manual/en/language.oop5.paamayim-nekudotayim.php#example-195
 */

class OtherClass extends MyClass
{
    public static $my_static = "static var";

    public static function doubleColon()
    {
        echo parent::CONST_VALUE . "\n<br>";
        echo self::$my_static . "\n<br>";
    }
}

$classname = "OtherClass";
$classname::doubleColon();

OtherClass::doubleColon();

echo "-----<br>";

/*
 * When an extending class overrides the parents definition of a method, 
 * PHP will not call the parent's method. It's up to the extends class on
 * whether or not the parent's method is called. 
 *
 * Example #3 Calling a parent's method
 * http://php.net/manual/en/language.oop5.paamayim-nekudotayim.php#example-196
 */

class MyClass1
{
    protected function myFunc()
    {
        echo "MyClass::myFunc()\n<br>";
    }
}

class OtherClass1 extends MyClass1
{
    // 覆盖父类的方法
    public function myFunc()
    {
        // 手动调用父类方法
        parent::myFunc();
        echo "OtherClass::myFunc()\n<br>";
    }
}

$class = new OtherClass1();
$class->myFunc();
?>
