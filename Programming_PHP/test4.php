<?php
// 迭代器接口
/**
 * 重新实现了一个简单的包含一个静态数组数据的迭代器类
 */
class BasicArray implements Iterator
{
    private $position = 0;
    private $array = ["first", "second", "third"];
    
    public function __construct()
    {
        $this->position = 0;
    }

    /*
     * 将迭代器移动到数组中的第一个元素
     */
    public function rewind()
    {
        $this->position = 0;
    }

    /*
     * 返回迭代器当前所指向的元素
     */
    public function current()
    {
        return $this->array[$this->position];
    }

    /*
     * 目前由迭代器指向的元素的键
     */
    public function key()
    {
        return $this->position;
    }

    /*
     * 移动迭代器到对象中的下一个元素并返回
     */
    public function next()
    {
        return $this->position += 1;
    }

    /*
     * 验证迭代器是否指向一个合法的元素
     */
    public function valid()
    {
        return isset($this->array[$this->position]);
    }
}

$basicArray = new BasicArray;

foreach ($basicArray as $value) {
    echo "{$value}<br>";
}
foreach ($basicArray as $key => $value) {
    echo "{$key} => {$value}<br>";
}
?>
