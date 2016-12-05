<?php
	# PHP session 变量用于存储有关用户会话的信息，或更改用户会话的设置。
	# session 变量保存的信息是单一用户的，并且可供应用程序中的所有页面使用。
	# session 的工作机制是：为每个访问者创建一个唯一的 id （UID），并且基于这个 UID 来存储变量。 UID 存储在 cookie 中，亦或通过 URL 进行传导。

	// session_start() 函数必须位于 <html> 标签之前
	session_start();

	// 存储 session 变量
	$_SESSION["hello"] = "Hello PHP!";

	// session_destroy() 函数必须位于 <html> 标签之前
	session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
	<title>PHP session</title>
</head>
<body>
<?php
	if (!isset($_SESSION["hello"])) {
		echo "the session is not exists!"."<br>";
	} else {
		echo $_SESSION["hello"]."<br>";
	}

	// 释放指定变量
	unset($_SESSION["hello"]);

	if (!isset($_SESSION["hello"])) {
		echo "the session is not exists!"."<br>";
	} else {
		echo $_SESSION["hello"]."<br>";
	}

	$_SESSION["hello"] = "Hello PHP!";

	// 彻底销毁 session
	// session_destroy();

	if (!isset($_SESSION["hello"])) {
		echo "the session is not exists!"."<br>";
	} else {
		echo $_SESSION["hello"]."<br>";
	}
?>
</body>
</html>