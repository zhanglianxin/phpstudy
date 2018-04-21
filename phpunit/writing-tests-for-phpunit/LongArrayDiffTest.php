<?php

use PHPUnit\Framework\TestCase;

class LongArrayDiffTest extends TestCase
{
    /**
     * Error output generated when an array comparison of an long array fails
     */
    public function testEquality()
    {
        $a = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2,  3, 4, 5, 6];
        $b = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2, 33, 4, 5, 6];

        $this->assertEquals($a, $b);
    }
}
