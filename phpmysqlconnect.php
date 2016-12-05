<?php
	# 连接到 MySQL 数据库

	// mysql_connect(server, username, password);
	$server = "localhost:3307";
	$username = "root";
	$password = "usbw";
	$con = mysql_connect($server, $username, $password);

	if (!$con) {
		die("Could not connect: ".mysql_error()."<br>");
	} else {
		echo "Connect success!<br>";
	}

	// 关闭连接
	$result = mysql_close($con);
	$retVal = ($result) ? "Close succeed!<br>" : "Close failed!<br>";
	echo $retVal;
?>