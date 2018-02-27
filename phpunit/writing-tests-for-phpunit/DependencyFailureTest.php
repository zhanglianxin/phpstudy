<?php

use PHPUnit\Framework\TestCase;

/**
 * Exploiting the dependencies between tests
 */
class DependencyFailureTest extends TestCase
{
    public function testOne()
    {
        $this->assertTrue(false);
    }

    /**
     * @depends testOne
     */
    public function testTwo()
    {
    }
}
