<?php

/*
 * <code>serialize()</code> checks if your class has a function with 
 * the magic name <code>__sleep()</code>. If so, that function is 
 * executed prior to any serialization. It can clean up the object
 * and is supposed to return an array with the names of all variables
 * of that object that should be serialized. If the method doesn't 
 * return anything then NULL is serialized and E_NOTICE is issued.
 *
 * It is not possible for <code>__sleep()</code> to return names of 
 * private properties in parent classes.
 *
 * The intended use of <code>__sleep()</code> is to commit pending
 * data or perform similar cleanup tasks.
 *
 *
 * <code>unserialize()</code> checks for the presence of a function
 * with the magic name <code>__wakeup()</code>. If present, this
 * function can reconstruct any resources that the object may have.
 *
 * The intended use of <code>__wakeup()</code> is to reestablish any
 * database connections that may have been lost during serialization
 * and perform other reinitialization tasks.
 *
 * Example #1 Sleep and wakeup
 * http://php.net/manual/en/language.oop5.magic.php#language.oop5.traits.precedence.examples.ex2
 */

class Connection
{
    protected $link;
    private $dsn, $username, $password;

    public function __construct($dsn, $username, $password)
    {
        $this->dsn = $dsn;
        $this->username = $username;
        $this->password = $password;
        $this->connect();
    }

    public function connect()
    {
        $this->link = new PDO($this->dsn, $this->username, $this->password);
    }

    public function __sleep()
    {
        return array("dsn", "username", "password");
    }

    public function __wakeup()
    {
        $this->connect();
    }
}

$dsn = "mysql:dbname=test;host=127.0.0.1";
$username = "root";
$password = "root";
$con = new Connection($dsn, $username, $password);
$ser = serialize($con);
var_dump($ser);

$unser = unserialize($ser);
var_dump($unser);

echo "<br>-----<br>";

/*
 * The <code>__toString()</code> method allows a class to decide how it will 
 * react when it is treated like a string.
 *
 * You cannot throw an exception from within a <code>__toString()</code> 
 * method. Doing so will result in a fatal error.
 *
 * Example #2 Simple example
 * http://php.net/manual/en/language.oop5.magic.php#language.oop5.traits.multiple.ex1
 */

class TestClass
{
    public $foo;

    public function __construct($foo)
    {
        $this->foo = $foo;
    }

    public function __toString()
    {
        return $this->foo;
    }
}

$class = new TestClass("Hello");

echo $class;

echo "<br>-----<br>";

/*
 * The <code>__invoke()</code> method is called when a script tries 
 * to call an object as a function.
 *
 * Example #3 Using __invoke()
 * http://php.net/manual/en/language.oop5.magic.php#language.oop5.traits.conflict.ex1
 */

class CallableClass
{
    public function __invoke($x)
    {
        var_dump($x);
    }
}

$obj = new CallableClass();
$obj(5);
echo "<br>";
var_dump(is_callable($obj));

echo "<br>-----<br>";

/*
 * This static method is called for classes exported by 
 * <code>var_export()</code> since PHP 5.1.0.
 *
 * The only parameter of this method is an array containing exported
 * properties in the form array('property' => value, ...).
 *
 * Example #4 Using __set_state() (since PHP 5.1.0)
 * http://php.net/manual/en/language.oop5.magic.php#language.oop5.traits.visibility.ex1
 */

class A
{
    public $var1, $var2;

    public static function __set_state($an_array)
    {
        $obj = new A();
        $obj->var1 = $an_array["var1"];
        $obj->var2 = $an_array["var2"];

        return $obj;
    }
}

$a = new A();
$a->var1 = 5;
$a->var2 = "foo";

// eval("$b = " . var_export($a, true) . ";"); // do not work
eval('$b = ' . var_export($a, true) . ';');
var_dump($b); // object(A)#8 (2) { ["var1"]=> int(5) ["var2"]=> string(3) "foo" } 

echo "<br>";
// $b = var_export($a, true);
// var_dump($b); // string(60) "A::__set_state(array( 'var1' => 5, 'var2' => 'foo', ))" 

/*
 * When exporting an object, <code>var_export()</code> does not check whether
 * <code>__set_state()</code> is implemented by the object's class, so 
 * re-importing such objects will fail, if __set_state is not implemented. 
 * Particularly, this affects some internal classes. It is the responsibility 
 * of the programmer to verify that only objects will be re-imported, whose
 * class implements <code>__set_state()</code>.
 */

echo "<br>-----<br>";

/*
 * This method is called by <code>var_dump()</code> when dumping an object to
 * get the properties that should be shown. If the method isn't defined on an
 * object, then all public, protected and private properties will be shown.
 * This feature was added in PHP 5.6.0.
 *
 * Example #5 Using __debugInfo()
 * http://php.net/manual/en/language.oop5.magic.php#language.oop5.traits.composition.ex1
 */

class C
{
    private $prop;

    public function __construct($val)
    {
        $this->prop = $val;
    }

    public function __debugInfo()
    {
        return ['propSquared' => $this->prop * 2];
    }
}

var_dump(new C(42));

?>
