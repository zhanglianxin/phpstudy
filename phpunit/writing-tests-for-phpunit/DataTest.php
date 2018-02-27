<?php

use PHPUnit\Framework\TestCase;

class DataTest extends TestCase
{
    public function additionProvider()
    {
        return [
            [0, 0, 0],
            [0, 1, 1],
            [1, 0, 1],
            [1, 1, 3],
        ];
    }

    public function additionProvider1()
    {
        return [
            'adding zeros'  => [0, 0, 0],
            'zero plus one' => [0, 1, 1],
            'one plus zero' => [1, 0, 1],
            'one plus one'  => [1, 1, 3],
        ];
    }

    /**
     * Using a data provider that returns an array of arrays
     *
     * @dataProvider additionProvider
     */
    public function testAdd($a, $b, $expected)
    {
        $this->assertEquals($expected, $a + $b);
    }

    /**
     * Using a data provider with named datasets
     *
     * @dataProvider additionProvider1
     */
    public function testAdd1($a, $b, $expected)
    {
        $this->assertEquals($expected, $a + $b);
    }
}
