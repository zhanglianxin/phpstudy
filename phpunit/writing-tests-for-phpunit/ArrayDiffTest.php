<?php

use PHPUnit\Framework\TestCase;

class ArrayDiffTest extends TestCase
{
    public function testEquality()
    {
        $a = [1, 2,  3, 4, 5, 6];
        $b = [1, 2, 33, 4, 5, 6];

        $this->assertEquals($a, $b);
    }
}
