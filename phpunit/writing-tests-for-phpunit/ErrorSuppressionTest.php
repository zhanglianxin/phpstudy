<?php

use PHPUnit\Framework\TestCase;

class ErrorSupressionTest extends TestCase
{
    public function testFileWriting()
    {
        $writer = new FileWriter();
        $this->assertFalse(@$writer->write('/is-not-writeable/file', 'stuff'));
    }
}

class FileWriter
{
    public function write($file, $content)
    {
        $file = fopen($file, 'w');
        if ($file == false) {
            return false;
        }
        // ...
    }
}
