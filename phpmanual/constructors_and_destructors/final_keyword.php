<?php

/*
 * The final keyword, which prevents child classes from overriding a method
 * by prefixing the definition with <code>final</code>. If the class itself
 * is being defined final then it cannot be extended.
 *
 * Example #1 Final methods exmaple
 * http://php.net/manual/en/language.oop5.final.phpid="language.oop5.traits.abstract.ex1"
 */

class BaseClass
{
    public function test()
    {
        echo "BaseClass::test() called\n<br>";
    }

    final public function moreTesting()
    {
        echo "BaseClass::moreTesting() called\n<br>";
    }
}

class ChildClass extends BaseClass
{
    // Fatal error: Cannot override final method BaseClass::moreTesting() 
    /*public function moreTesting()
    {
        echo "ChildClass::moreTesting() called\n<br>";
    }*/
}


/*
 * Example #2 Final class example
 * http://php.net/manual/en/language.oop5.final.php#language.oop5.traits.static.ex1
 */

final class BaseClass1
{
    public function test()
    {
        echo "BaseClass1::test() called\n<br>";
    }

    final public function moreTesting()
    {
        echo "BaseClass1::moreTesting() called\n<br>";
    }
}

// Class ChildClass may not inherit from final class (BaseClass1)
/*class ChildClass extends BaseClass1
{
}*/

?>
