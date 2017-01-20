<?php
class Log
{
    private $filename, $fh;

    function __construct($filename) {
        $this->filename = $filename;
        $this->open();
    }

    function open() {
        $this->fh = fopen($this->filename, 'a') or die("Can't open {$this->filename}");
    }

    function write($note) {
        fwrite($this->fh, "{$note}\n");
    }

    function read() {
        return join('', file($this->filename));
    }

    function __wakeup() {
        $this->open();
    }

    function __sleep() {
        // 向统计文件中写入信息
        fclose($this->fh);
        
        return array("filename");
    }
}
?>
