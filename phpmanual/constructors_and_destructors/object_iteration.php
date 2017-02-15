<?php

/*
 * By default, all visible properties will be used for the iteration.
 *
 * Example #1 Simple Object Iteration
 * http://php.net/manual/en/language.oop5.iterations.php#language.oop5.interfaces.examples.ex4
 */

class MyClass
{
    public $var1 = "value 1";
    public $var2 = "value 2";
    public $var3 = "value 3";

    protected $protected = "protected var";
    private $private = "private var";

    function iterateVisible()
    {
        echo "MyClass::iterateVisible:\n<br>";
        foreach ($this as $key => $value) {
            print "$key => $value\n<br>";
        }
    }
}

$class = new MyClass();
foreach ($class as $key => $value) {
    print "$key => $value\n<br>";
}
echo "\n<br>";

$class->iterateVisible();

echo "<br>-----<br>";

/*
 * The Iterator interface may be implemented. This allows the object
 * to dictate how it will be iterated and what values will be available
 * on each iteration.
 *
 * Example #2 Object Iteration implementing Iterator
 * http://php.net/manual/en/language.oop5.iterations.php#language.oop5.traits.basicexample
 */

class MyIterator implements Iterator
{
    private $var = array();

    public function __construct($array)
    {
        if (is_array($array)) {
            $this->var = $array;
        }
    }

    public function rewind()
    {
        echo "rewinding\n<br>";
        reset($this->var);
    }

    public function current()
    {
        $var = current($this->var);
        echo "current: $var\n<br>";

        return $var;
    }

    public function key()
    {
        $var = key($this->var);
        echo "key: $var\n<br>";

        return $var;
    }

    public function next()
    {
        $var = next($this->var);
        echo "next: $var\n<br>";

        return $var;
    }

    public function valid()
    {
        $key = key($this->var);
        $var = ($key !== NULL && $key !== FALSE);
        echo "valid: $var\n<br>";

        return $var;
    }
}

$values = array(1, 2, 3);
$it = new MyIterator($values);

foreach ($it as $key => $value) {
    print "$key: $value\n<br>";
}

echo "<br>-----<br>";

/*
 * The IteratorAggregate interface can be used as an alternative to 
 * implementing all of the Iterator methods. IteratorAggregate only
 * requires the implementation of a single method, 
 * <code>IteratorAggregate::getIterator()</code>, which should return
 * an instance of a class implementing Iterator.
 *
 * Example #3 Object Iteration implementing IteratorAggregate
 * http://php.net/manual/en/language.oop5.iterations.php#language.oop5.traits.precedence.examples.ex1
 */

class MyCollection implements IteratorAggregate
{
    private $items = array();
    private $count = 0;

    public function getIterator()
    {
        return new MyIterator($this->items);
    }

    public function add($value)
    {
        $this->items[$this->count++] = $value;
    }
}

$coll = new MyCollection();
$coll->add("value 1");
$coll->add("value 2");
$coll->add("value 3");

foreach ($coll as $key => $value) {
    echo "key/value: [$key -> $value]\n\n<br><br>";
}
?>
