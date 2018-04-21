<?php

use PHPUnit\Framework\TestCase;

/**
 * Testing PHP errors
 */

class ExpectedErrorTest extends TestCase
{
    /**
     * Expecting a PHP error using `@expectedException`
     *
     * @expectedException PHPUnit\Framework\Error\Error
     */
    public function testFailingInclude()
    {
        include 'not_existing_file.php';
    }
}
