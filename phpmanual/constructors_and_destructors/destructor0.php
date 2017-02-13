<?php

/*
 * Example #3 Destructor Example
 * http://php.net/manual/en/language.oop5.decon.php#example-188
 */

class BaseClass
{
    function __construct()
    {
        print "In BaseClass constructor\n<br>";
    }

    function __destruct()
    {
        print "In BaseClass destructor\n<br>";
    }
}

class SubClass extends BaseClass
{
    function __construct()
    {
        parent::__construct();
        print "In SubClass constructor\n<br>";
    }
    function __destruct()
    {
        parent::__destruct();
        print "In SubClass destructor\n<br>";
    }
}

class OtherSubClass extends BaseClass
{
    // inherits BaseClass's constructor and destructor
}

// In BaseClass constructor #0
$obj = new BaseClass();
/*
 * In BaseClass constructor #1
 * In SubClass constructor  #1
 * In BaseClass destructor  #0
 */
$obj = new SubClass(); 
/*
 * In BaseClass constructor #2
 * In BaseClass destructor  #1
 * In SubClass destructor   #1
 * In BaseClass destructor  #2
 */
$obj = new OtherSubClass();
?>
