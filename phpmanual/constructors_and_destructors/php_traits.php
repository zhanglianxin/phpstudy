<?php

/*
 * Traits are a mechanism for code reuse in single inheritance languages
 * such as PHP. A Trait is intended to reduce some limitations of single
 * inheritance by enabling a developer to reuse sets of methods freely 
 * in several independent classes living in different class hierarchies.
 *
 * A Trait is similar to a class, but only intended to group functionality
 * in a fine-grained and consistent way. It is not possible to instantiate
 * a Trait on its own. It is an addition to traditional inheritance and
 * enables horizontal composition of behavior; that is, the application
 * of class members without requiring inheritance.
 */

/*
 * Example #1 Trait example
 * http://php.net/manual/en/language.oop5.traits.php#example-205
 */
trait ezcReflectionReturnInfo
{
    function getReturnType()
    {
        echo "getReturnType()<br>";
    }

    function getReturnDescription()
    {
        echo "getReturnDescription()<br>";
    }
}

class ezcReflectionMethod extends ReflectionMethod
{
    public function __construct() {}
    use ezcReflectionReturnInfo;
}

class ezcReflectionFunction extends ReflectionFunction
{
    public function __construct() {}
    use ezcReflectionReturnInfo;
}

$method = new ezcReflectionMethod();
$method->getReturnType();
$method->getReturnDescription();

$function = new ezcReflectionFunction();
$function->getReturnType();
$function->getReturnDescription();

echo "-----<br>";

/*
 * An inherited member from a base class is overridden by a member inserted
 * by a Trait. The precedence order is that members from the current class
 * override Trait methods, which in turn override inherited methods.
 *
 * Example #2 Precedence Order Example
 * http://php.net/manual/en/language.oop5.traits.php#example-206
 */

class Base
{
    public function sayHello()
    {
        echo "Hello ";
    }
}

trait SayWorld
{
    public function sayHello()
    {
        parent::sayHello();
        echo "World!";
    }
}

class MyHelloWorld extends Base
{
    use SayWorld;
}

$o = new MyHelloWorld();
$o->sayHello(); // 优先级：当前类、trait、基类

echo "<br>-----<br>";

/*
 * Example #3 Alternate Precedence Order Example
 * http://php.net/manual/en/language.oop5.traits.php#example-207
 */

trait HelloWorld
{
    public function sayHello()
    {
        echo "Hello World!";
    }
}

class TheWorldIsNotEnough
{
    use HelloWorld;
    public function sayHello()
    {
        echo "Hello Universe!";
    }
}

$o = new TheWorldIsNotEnough();
$o->sayHello();

echo "<br>-----<br>";

/*
 * Example #4 Multiple Traits Usage
 * http://php.net/manual/en/language.oop5.traits.php#example-208
 */

trait Hello
{
    public function sayHello()
    {
        echo "Hello ";
    }
}

trait World
{
    public function sayWorld()
    {
        echo "World";
    }
}

class MyHelloWorld1
{
    use Hello, World;

    public function sayExclamationMark()
    {
        echo "!";
    }
}

$o = new MyHelloWorld1();
$o->sayHello();
$o->sayWorld();
$o->sayExclamationMark();

echo "<br>-----<br>";

/*
 * To resolve naming conflicts between Traits used in the same class,
 * the <code>insteadof</code> operator needs to be used to choose 
 * exactly one of the conflicting methods.
 *
 * Since this only allows one to exclude methods, the <code>as</code>
 * operator can be used to add an alias to one of the methods. Note 
 * the <code>as</code> operator does not rename the method and it
 * does not affect any other method either.
 *
 * Example #5 Conflict Resolution 
 * http://php.net/manual/en/language.oop5.traits.php#example-209
 */

trait A
{
    public function smallTalk()
    {
        echo "a";
    }

    public function bigTalk()
    {
        echo "A";
    }
}

trait B
{
    public function smallTalk()
    {
        echo "b";
    }

    public function bigTalk()
    {
        echo "B";
    }
}

class Talker
{
    use A, B
    {
        B::smallTalk insteadof A;
        A::bigTalk insteadof B;
    }
}

$t = new Talker();
$t->smallTalk(); // b
$t->bigTalk(); // A

class Aliased_Talker
{
    use A, B
    {
        B::smallTalk insteadof A;
        A::bigTalk insteadof B;
        B::bigTalk as talk;
    }
}

$a = new Aliased_Talker();
$a->smallTalk(); // b
$a->bigTalk(); // A
$a->talk(); // B

echo "<br>-----<br>";

/*
 * Using the <code>as</code> syntax, one can also adjust the
 * visibility of the method in the exhibiting class.
 *
 * Example #6 Changing Method Visibility
 * http://php.net/manual/en/language.oop5.traits.php#example-210
 */

// Change visibility of sayHello
class MyClass
{
    use HelloWorld
    {
        sayHello as protected;
    }
}

$m = new MyClass();
// Call to protected method MyClass::sayHello() from context
// $m->sayHello();

class MyClass2
{
    use HelloWorld
    {
        sayHello as private myPrivateHello;
    }
}

$m = new MyClass2();
$m->sayHello(); // Hello World!
// Call to private method MyClass2::myPrivateHello() from context
// $m->myPrivateHello();

echo "<br>-----<br>";

/*
 * By using one or more traits in a trait definition, it can be composed
 * partially or entirely of the members defined in those other traits.
 *
 * Example #7 Traits Composed from Traits
 * http://php.net/manual/en/language.oop5.traits.php#example-211
 */

trait Hello1
{
    public function sayHello()
    {
        echo "Hello ";
    }
}

trait World1
{
    public function sayWorld()
    {
        echo "World!";
    }
}

trait HelloWorld1
{
    use Hello1, World1;
}

class MyHelloWorld2
{
    use HelloWorld1;
}

$o = new MyHelloWorld2();
$o->sayHello();
$o->sayWorld();

echo "<br>-----<br>";

/*
 * Traits support the use of abstract methods in order to impose 
 * requirements upon the exhibiting class.
 *
 * Example #8 Express Requirements by Abstract Methods
 * http://php.net/manual/en/language.oop5.traits.php#example-212
 */

trait Hello2
{
    public function sayHelloWorld()
    {
        echo "Hello" . $this->getWorld();
    }
    
    abstract public function getWorld();
}

class MyHelloWorld3
{
    private $world;
    use Hello2;

    public function getWorld()
    {
        return $this->world;
    }

    public function setWorld($val)
    {
        $this->world = $val;
    }
}

$o = new MyHelloWorld3();
$o->setWorld(" World!");
$o->sayHelloWorld();

echo "<br>-----<br>";

/*
 * Traits can define both static members and static methods.
 *
 * Example #9 Static Variables
 * http://php.net/manual/en/language.oop5.traits.php#example-213
 */

trait Counter
{
    public function inc()
    {
        static $c = 0;
        $c += 1;
        echo $c . "\n<br>";
    }
}

class C1
{
    use Counter;
}

class C2
{
    use Counter;
}

$o = new C1();
$o->inc();

$p = new C2();
$p->inc();

/*
 * Example #10 Static Methods
 * http://php.net/manual/en/language.oop5.traits.php#example-214
 */

trait StaticExample
{
    public static function doSomething()
    {
        return "Doing something";
    }
}

class Example
{
    use StaticExample;
}

echo Example::doSomething();

echo "<br>-----<br>";

/*
 * Traits can also define properties.
 *
 * Example #11 Defining Properties
 * http://php.net/manual/en/language.oop5.traits.php#example-215
 */

trait PropertiesTrait
{
    public $x = 1;
}

class PropertiesExample
{
    use PropertiesTrait;
}

$example = new PropertiesExample();
echo $example->x;

echo "<br>-----<br>";

/*
 * If a trait defines a property then a class can not define a property
 * with the same name, otherwise an error is issued. It is an E_STRICT
 * if the class definition is compatible (same visibility and initial 
 * value) or fatal error otherwise.
 *
 * Example #12 Conflict Resolution
 * http://php.net/manual/en/language.oop5.traits.php#example-216
 */

trait PropertiesTrait1
{
    public $same = true;
    public $different = false;
}

class PropertiesExample1
{
    use PropertiesTrait1;
    /*
     * Strict Standards: PropertiesExample1 and PropertiesTrait1 define
     * the same property ($same) in the composition of PropertiesExample1. 
     * This might be incompatible, to improve maintainability consider 
     * using accessor methods in traits instead. 
     */
    public $same = true;
    /*
     * Fatal error: PropertiesExample1 and PropertiesTrait1 define the 
     * same property ($different) in the composition of ropertiesExample1.
     * However, the definition differs and is considered incompatible. 
     */
    public $different = true;
}

?>
