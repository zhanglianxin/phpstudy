<?php
/**
 * 对象自省函数
 */
// 返回一个可调用方法的数组（包括继承的方法）
function getCallableMethods($object)
{
    // 得到当前类所有方法
    $methods = get_class_methods(get_class(new $object));
    // 如果父类存在， 获取父类所有方法，得到当前类特有的方法
    if (get_parent_class($object)) {
        $parent_methods = get_class_methods(get_parent_class($object));
        $methods = array_diff($methods, $parent_methods);
    }

    return $methods;
}

// 返回一个继承方法的数组
function getInheritedMethods($object)
{
    // 得到当前类所有方法
    $methods = get_class_methods(get_class(new $object));
    // 如果父类存在， 获取父类所有方法，得到子父类共有的方法
    if (get_parent_class($object)) {
        $parent_methods = get_class_methods(get_parent_class($object));
        $methods = array_intersect($methods, $parent_methods);
    }

    return $methods;
}

// 返回一个父类的数组
function getLineage($object)
{

    // 如果父类存在，递归调用当前函数获取父类名，否则返回当前类名
    if (get_parent_class($object)) {
        $parent = get_parent_class($object); // 父类名
        $parentObject = new $parent;
        $lineage = getLineage($parentObject); // 递归
        $lineage[] = get_class($object); // 在数组末尾添加值
        // $lineage 为什么是数组，因为是在 else 中定义的
    } else {
        $lineage = array(get_class($object));
    }

    return $lineage;
}

// 返回一个子类的数组
function getChildClasses($object)
{
    // 返回由已定义类的名字所组成的数组
    $classes = get_declared_classes();
    $children = array();
    foreach ($classes as $class) {
        if (substr($class, 0, 2) == '__' || !(new ReflectionClass($class))->isInstantiable()
            || !is_null((new ReflectionClass($class))->getConstructor()) || $class === "PDORow"
        ) {
            continue;
        }
        // echo $class . "&nbsp;"; // stdClass Exception ErrorException Closure 
        $child = new $class; // Instantiation of 'Closure' is not allowed
        if (get_parent_class($child) == get_class($object)) {
            $children[] = $class;
        }
    }

    return $children;
}

// 显示一个对象的信息
function printObjectInfo($object)
{
    $class = get_class($object);
    echo "<h2>Class</h2>";
    echo "<p>{$class}</p>";
    echo "<h2>Inheritance</h2>";
    echo "<h3>Parents</h3>";
    $lineage = getLineage($object);
    array_pop($lineage);
    if (count($lineage) > 0) {
        echo "<p>" . join(" -&gt; ", $lineage) . "</p>";
    } else {
        echo "<i>None</i>";
    }
    echo "<h3>Children</h3>";
    $children = getChildClasses($object);
    echo "<p>";

    if (count($children) > 0) {
        echo join(", ", $children);
    } else {
        echo "<i>None</i>";
    }
    echo "</p>";
    echo "<h2>Methods</h2>";
    $methods = getCallableMethods($class);
    // TODO 可能会有问题
    $object_methods = getInheritedMethods($class);
    if (!count($methods)) {
        echo "<i>None</i><br>";
    } else {
        echo "<p>Inherited methods are in <i>italics</i>.</p>";
        foreach ($methods as $method) {
            if (in_array($method, $object_methods)) {
                echo "<b>{$method}</b>();<br>";
            } else {
                echo "<i>{$method}</i>();<br>";
            }
        }
    }
    echo "<h2>Properties</h2>";
    $properties = get_class_vars($class);
    if (!count($properties)) {
        echo "<i>None</i><br>";
    } else {
        foreach (array_keys($properties) as $property) {
            echo "<b>\${$property}</b> = " . $object->$property . "<br>";
        }
    }
    echo "<hr>";
}

/****************************/

class A
{
    public $foo = "foo";
    public $bar = "bar";
    public $baz = 17.0;

    function firstFunction()
    {

    }

    function secondFunction()
    {

    }
}

class B extends A
{
    public $quux = false;

    function thirdFunction()
    {

    }
}

class C extends B
{
}

$a = new A;
$a->foo = "sylvie";
$a->bar = 23;
$b = new B;
$b->foo = "bruno";
$b->quux = true;
$c = new C;
// printObjectInfo($a);
printObjectInfo($b);
printObjectInfo($c);
?>
