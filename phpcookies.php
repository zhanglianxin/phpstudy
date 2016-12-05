<?php
	/* 创建 cookie */
	// setcookie(name, value, expire, path, domain);
	setcookie("user", "jntci", time() + 60);
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php
	if (isset($_COOKIE["user"])) {
		echo "Welcome ".$_COOKIE["user"]."!<br>";
	} else {
		echo "Welcome guest!<br>";
		// all cookies
		print_r($_COOKIE);
	}
?>
</body>
</html>