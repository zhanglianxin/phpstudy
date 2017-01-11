<?php
// 声明一个类
class A
{
    // final 不能修饰属性，只能修饰方法和类
    // final static $f = 0;
}
?>

<?php
// trait 
// 它允许在不需要创建一个父类的情况下，便可以在不同层次结构的类中复用类外部的代码，共享不同类的方法。
trait Logger
{
    public function log($logString) {
        $className = __CLASS__;
        echo date("Y-m-d h:i:s", time()) . ": [{$className}] {$logString}<br>";
    }
}
/*
 * 想要声明一个类，并包含 trait 的方法，要使用 use 关键字，有多个 trait 时用逗号隔开。
 */
class User
{
    use Logger;
    public $name;

    function __construct($name = '') {
        $this->name = $name;
        $this->log("Create user '{$this->name}'");
    }

    function __toString() {
        return $this->name;
    }
}
class UserGroup
{
    use Logger;

    public $users = array();

    public function addUser(User $user) {
        if (!$this->includesUser($user)) {
            $this->users[] = $user;
            $this->log("Added user '{$user}' to group");
        }
    }

    private function includesUser(User $user) {
        if (!isset($users)) {
            return false;
        }
        return array_key_exists($user, $users);
    }
}
$group = new UserGroup;
$group->addUser(new User("Franklin"));
?>

<?php
echo "-----<br>";
trait First
{
    public function doFirst() {
        echo "first<br>";
    }
}

trait Second
{
    public function doSecond() {
        echo "second<br>";
    }
}
// 使用多个 trait
trait Third
{
    use First, Second;

    public function doAll() {
        $this->doFirst();
        $this->doSecond();
    }
}
class Combined
{
    use Third;
}
$object = new Combined;
$object->doAll();
?>

<?php
echo "-----<br>";
trait Command
{
    function run() {
        echo "Executing a command<br>";
    }
}
trait Marathon
{
    function run() {
        echo "Running a marathon<br>";
    }
}
// 一个类在一个类方法中使用了多个 trait ，会产生致命错误
// 通过重写某个方法，进而告诉编译器想使用该类方法的哪种实现。
class Person
{
    use Command, Marathon {
        Marathon::run insteadof Command;
    }
}
$person = new Person;
$person->run();

echo "-----<br>";

// 除了只包含一个方法外，可以使用 as 关键字为 trait 的方法在类中定义一个别名。
// 仍然需要显示地解决包含在 trait 中的各种冲突。
class Person1
{
    use Command, Marathon {
        Command::run as runCommand;
        Marathon::run insteadof Command;
    }
}
$person = new Person1;
$person->run();
$person->runCommand();
?>

<?php
echo "-----<br>";
trait Sortable
{
    abstract function uniqueId();
    function compareById($object) {
        return $object->uniqueId() < $this->uniqueId() ? -1 : 1;
    }
}
class Bird
{
    use Sortable;
    function uniqueId() {
        return "{$this->id}";
    }
}
// Fatal error: Class Car contains 1 abstract method and must therefore
// be declared abstract or implement the remaining methods (Car::uniqueId) 
class Car
{
    use Sortable;
    function uniqueId() {
        return "{$this->id}";
    }
}
$bird = new Bird;
$bird->id = 1;
$car = new Car;
$car->id = 0;
$comparison = $bird->compareById($car);
echo $comparison . "<br>";
?>
