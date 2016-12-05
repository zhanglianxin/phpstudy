<?php
	// 打开非持久的MySQL连接
	$con = mysql_connect("localhost:3307", "root", "usbw");
	if (!$con) {
		// 输出一条消息，并退出当前脚本 同exit()
		die("Could not connect: ".mysql_error());
	}

	// 设置活动的数据库
	mysql_select_db("phptest", $con);

	// 对记录集中的数据进行排序，默认升序
	$sql = "SELECT * FROM persons ORDER BY age";
	$result = mysql_query($sql);
	while ($row = mysql_fetch_array($result)) {
		echo $row['firstname']." ".$row['lastname']." ".$row['age']."<br>";
	}
	echo "<br>";

	// 降序排序
	$sql = "SELECT * FROM persons ORDER BY age DESC";
	$result = mysql_query($sql);
	while ($row = mysql_fetch_array($result)) {
		echo $row['firstname']." ".$row['lastname']." ".$row['age']."<br>";
	}
	echo "<br>";

	// 根据两列进行排序
	$sql = "SELECT * FROM persons ORDER BY lastname, age";
	$result = mysql_query($sql);
	while ($row = mysql_fetch_array($result)) {
		echo $row['firstname']." ".$row['lastname']." ".$row['age']."<br>";
	}
	echo "<br>";

	// 修改数据
	$sql = "UPDATE persons SET firstname='sisisi' WHERE firstname='4'";
	// TODO 没法看是否修改成功啊
	/*
		仅对 SELECT，SHOW，EXPLAIN 或 DESCRIBE 语句返回一个资源标识符，
		如果查询执行不正确则返回 FALSE。
		对于其它类型的 SQL 语句，mysql_query() 在执行成功时返回 TRUE，
		出错时返回 FALSE。
		非 FALSE 的返回值意味着查询是合法的并能够被服务器执行。
		这并不说明任何有关影响到的或返回的行数。
		很有可能一条查询执行成功了但并未影响到或并未返回任何行。
	*/
	$result = mysql_query($sql);
	if (!$result) {
		echo "Error in SQL";
	}

	// 删除数据
	$sql = "DELETE FROM persons WHERE 'firstname'='5'";
	$result = mysql_query($sql);
	if (!$result) {
		echo "Error in SQL";
	}

	// 关闭非持久的MySQL连接
	mysql_close($con);
?>