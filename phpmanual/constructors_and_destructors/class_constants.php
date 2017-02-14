<?php

/*
 * It is possible to define constant values on a per-class basis remaining
 * the same and unchangeable. Constants differ from normal variables in that
 * you don't use the <code>$</code> symbol to declare or use them. The default
 * visibility of class constants is public.
 *
 * The value must be a constant expression, not (for example) a variable,
 * a property, or a function call.
 *
 * It's also possible for interfaces to have constants.
 *
 * As of PHP 5.3.0, it's possible to reference the class using a variable.
 * The variable's value can not be a keyword (e.g. <code>self</code>, 
 * <code>parent</code>, and <code>static</code>).
 * 
 * Note that class constants are allocated once per class, and not for each
 * class instance.
 *
 * Example #1 Defining and using a constant
 * http://php.net/manual/en/language.oop5.constants.php#example-177
 */

class MyClass
{
    const CONSTANT = "constant value";

    function showConstant()
    {
        echo self::CONSTANT . "\n<br>";
    }
}

echo MyClass::CONSTANT . "\n<br>";

$classname = "MyClass";
echo $classname::CONSTANT . "\n<br>"; // As of PHP 5.3.0

$class = new MyClass();
$class->showConstant();

echo $class::CONSTANT . "\n<br>"; // As of PHP 5.3.0

echo "-----<br>";

/*
 * Example #2 Static data example
 * http://php.net/manual/en/language.oop5.constants.php#example-178
 */
class foo {
    // As of PHP 5.3.0
    const BAR = <<<'EOT'
bar
EOT;
    // As of PHP 5.3.0
    const BAZ = <<<EOT
baz
EOT;
}

echo foo::BAR;
?>
