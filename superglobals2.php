<?php
    # 超全局变量 Since PHP 4.1.0
    /*
        是在全部作用域中始终可用的内置变量
        $GLOBALS $_SERVER $_REQUEST $_POST 
        $_GET $_FILES $_ENV $_COOKIE $_SESSION 
    */
    // $_REQUEST 用于收集HTML表单提交的数据

    // $_POST 用于收集post提交HTML表单后的表单数据，也常用于传递变量
    // $_GET 用于收集get提交HTML表单后的表单数据，也可以收集URL中发送的数据
?>
<h2>$_REQUEST获取表单数据</h2>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    Name: <input type="text" name="fname">
    <input type="submit" value="提交">
</form>
<?php
    $name = $_REQUEST["fname"];
    echo $name;
?>
<hr>

<h2>$_POST获取表单数据</h2>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    Name: <input type="text" name="fname">
    <input type="submit" value="提交">
</form>
<?php
    $name = $_POST["fname"];
    echo $name;
?>
<hr>

<h2>$_GET获取表单数据</h2>
<form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    Name: <input type="text" name="fname">
    <input type="submit" value="提交">
</form>
<?php
    $name = $_GET["fname"];
    echo $name;
?>
<hr>

<h2>$_GET获取表单数据</h2>
<a href="<?php echo $_SERVER['PHP_SELF']; ?>?name=google&web=google.com">测试 $GET</a><br>
<?php
    echo "name= ".$_GET["name"]."<br>web= ".$_GET["web"];
?>
