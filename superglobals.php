<?php
	# 超全局变量 Since PHP 4.1.0
	/*
		是在全部作用域中始终可用的内置变量
		$GLOBALS $_SERVER $_REQUEST $_POST 
		$_GET $_FILES $_ENV $_COOKIE $_SESSION 
	*/
	// $GLOBALS 用于在PHP脚本中的任意位置访问全局变量
	// 在名为$GLOBALS[index]的数组中存储了所有全局变量，
	// 变量的名字就是数组的键
	$x = 75;
	$y = 25;
	function addition()
	{
		$GLOBALS["z"] = $GLOBALS["x"] + $GLOBALS["y"];
	}
	addition();
	echo $z; // z是$GLOBALS数组中的变量，因此字啊函数之外也可以访问
	echo "<hr>";

	// $_SERVER 保存关于报头、路径和脚本位置的信息
	echo 'PHP_SELF: '.$_SERVER['PHP_SELF']."<br>"; // 当前执行脚本的文件名
	echo 'SERVER_NAME: '.$_SERVER['SERVER_NAME']."<br>"; 
	echo 'HTTP_HOST: '.$_SERVER['HTTP_HOST']."<br>";
	echo 'HTTP_REFERER: '.$_SERVER['HTTP_REFERER']."<br>";
	echo 'HTTP_USER_AGENT: '.$_SERVER['HTTP_USER_AGENT']."<br>";
	echo 'SCRIPT_NAME: '.$_SERVER['SCRIPT_NAME']."<br>";
	echo "REMOTE_ADDR: ".$_SERVER["REMOTE_ADDR"]."<br>";

	// $_REQUEST 用于收集HTML表单提交的数据
	


?>
<a href="superglobals.php">跳转</a>
