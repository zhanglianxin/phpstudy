<?php

/*
 * An object copy is created by using the clone keyword (which calls the
 * object's <code>__clone()</code> method if possible). An object's __clone()
 * method cannot be called directly.
 * <pre>$copy_of_object = clone $object;</pre>s
 * When an object is cloned, PHP 5 will perform a shallow copy of all of the
 * object's properties. Any properties that are references to other variables
 * will remain references.
 * Once the cloning is complete, if a __clone() method isj defined, then the
 * newly created object's __clone() method will be called, to allow any
 * necessary properties that need to be changed.
 */

/*
 * Example #1 Cloning an object
 * http://php.net/manual/en/language.oop5.cloning.php#language.oop5.traits.static.ex2
 */

class SubObject
{
    static $instances = 0;
    public $instance;

    public function __construct()
    {
        $this->instance = ++self::$instances;
    }

    public function __clone()
    {
        $this->instance = ++self::$instances;
    }
}

class MyCloneable
{
    public $object1, $object2;
 
    function __clone()
    {
        // Force a copy of this->object, otherwise it will point to same object
        $this->object1 = clone $this->object1;
    }
}

$obj = new MyCloneable();

$obj->object1 = new SubObject();
$obj->object2 = new SubObject();

$obj2 = clone $obj;

print("Original Object:\n<br>");
echo "<pre>";
print_r($obj);
echo "</pre>";
echo "\n<br>";
print("Cloned Object:\n<br>");
echo "<pre>";
print_r($obj2);
echo "</pre>";

/*
 * PHP 7.0.0 introduced the possibility to access a member of a freshly cloned
 * object in a single expression:
 * Example #2 Access member of freshly cloned object
 * http://php.net/manual/en/language.oop5.cloning.php#language.oop5.traits.properties.example
 */

/*$dataTime = new DateTime();
echo (clone $dateTime)->format('Y');*/

?>
