<?php

namespace Foo;

/*
 * Example #2 Constructors in namespaced classes
 * http://php.net/manual/en/language.oop5.decon.php#example-187
 */

class Bar
{
    public function Bar()
    {
        // treated as constructor in PHP 5.3.0-5.3.2
        // treated as regular method as of PHP 5.3.3
    }
}
?>
