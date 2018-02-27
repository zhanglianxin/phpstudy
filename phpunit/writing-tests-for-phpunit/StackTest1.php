<?php

use PHPUnit\Framework\TestCase;

/**
 * Using the `@depends` annotation to express dependencies
 */
class StackTest1 extends TestCase
{
    protected $original;

    public function testEmpty()
    {
        $stack = [];
        $this->assertEmpty($stack);

        return $stack;
    }

    /**
     * @depends testEmpty
     */
    public function testPush(array $stack)
    {
        array_push($stack, 'foo');
        $this->assertEquals('foo', $stack[count($stack) - 1]);
        $this->assertNotEmpty($stack);
        $this->original = $stack;

        return $stack;
    }

    /**
     * @depends testPush
     */
    public function testPushAndPop(array $stack)
    {
        $this->assertEquals('foo', array_pop($stack));
        $this->assertEmpty($stack);
    }

    /**
     * @depends clone testPush
     */
    public function testClone(array $stackCopy)
    {
        $this->assertNotEquals($stackCopy, $this->original);
    }
}
