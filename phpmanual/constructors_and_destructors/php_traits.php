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
?>
