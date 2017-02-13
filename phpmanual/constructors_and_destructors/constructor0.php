<?php

/*
 * Example #1 using new unified constructors
 * http://php.net/manual/en/language.oop5.decon.php#example-186
 */

class BaseClass
{
    function __construct()
    {
        print "In BaseClass constructor\n<br>";
    }
}

class SubClass extends BaseClass
{
    function __construct()
    {
        parent::__construct();
        print "In SubClass constructor\n<br>";
    }
}

class OtherSubClass extends BaseClass
{
    // inherits BaseClass's constructor
}

// In BaseClass constructor 
$obj = new BaseClass();
/*
 * In BaseClass constructor
 * In SubClass constructor
 */
$obj = new SubClass();
// In BaseClass constructor
$obj = new OtherSubClass();
?>
