<?php

use PHPUnit\Framework\TestCase;

/**
 * Testing exceptions
 */
class ExceptionTest extends TestCase
{
    // Using the `expectException()` method
    public function testException()
    {
        $this->expectException(InvalidArgumentException::class);
    }

    /**
     * Using the `@expectedException` annotation
     *
     * @expectedException InvalidArgumentException
     */
    public function testException1()
    {

    }
}
