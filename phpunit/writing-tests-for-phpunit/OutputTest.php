<?php

use PHPUnit\Framework\TestCase;

/**
 * Testing output
 *
 * [Methods for testing output](https://phpunit.de/manual/6.5/en/writing-tests-for-phpunit.html#writing-tests-for-phpunit.output.tables.api)
 */
class OutputTest extends TestCase
{
    /**
     * Testing the output of a function or method
     */
    public function testExpectFooActualFoo()
    {
        $this->expectOutputString('foo');
        print 'foo';
    }

    public function testExpectBarActualBaz()
    {
        $this->expectOutputString('bar');
        print 'baz';
    }
}
