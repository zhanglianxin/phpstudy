<?php

use PHPUnit\Framework\TestCase;

/**
 * Test with multiple dependencies
 */
class MultipleDependenciesTest extends TestCase
{
    public function testProducerFirst()
    {
        $this->assertTrue(true);

        return 'first';
    }

    public function testProducerSecond()
    {
        $this->assertTrue(true);

        return 'second';
    }

    /**
     * @depends testProducerFirst
     * @depends testProducerSecond
     */
    public function testConsumer()
    {
        $this->assertEquals(['first', 'second'], func_get_args());
    }
}
