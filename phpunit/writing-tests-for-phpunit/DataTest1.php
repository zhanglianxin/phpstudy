<?php

use PHPUnit\Framework\TestCase;

require_once 'CsvFileIterator.php';

/**
 * Using a data provider that returns an Iterator object
 */
class DataTest1 extends TestCase
{
    public function additionProvider()
    {
        return new CsvFileIterator('data.csv');
    }

    /**
     * @dataProvider additionProvider
     */
    public function testAdd($a, $b, $expected)
    {
        $this->assertEquals($expected, $a + $b);
    }
}
