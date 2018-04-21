<?php

use PHPUnit\Framework\TestCase;

/**
 * Edge cases
 *
 * When a comparison fails PHPUnit creates textual representations of the input
 * values and compares those. Due to that implementation a diff might show more
 * problems than actually exist.
 * This only happens when using assertEquals or other 'weak' comparison
 * functions on arrays or objects.
 */
class ArrayWeakComparisonTest extends TestCase
{
    /**
     * Edge case in the diff generation when using weak comparison
     */
    public function testEquality()
    {
        $a = [1, 2, 3, 4, 5, 6];
        $b = ['1', 2, 33, 4, 5, 6];

        $this->assertEquals($a, $b);
    }
}
