<?php
	# 在 PHP 中，有三种数组类型：
	#	索引数组：带有数字索引的数组
	#	关联数组：带有指定键的数组
	#	多维数组：包含一个或多个数组的数组

	/* 索引数组 */
	// 自动分配索引
	$cars = array("Volvo", "BMW", "SAAB");
	// 手动分配索引
	/*$cars[0] = "Volvo";
	$cars[1] = "BMW";
	$cars[2] = "SAAB";*/
	// 获得数组的长度
	$arrayLength = count($cars);
	// 遍历索引数组
	for ($i = 0; $i < $arrayLength; $i++) { 
		echo $cars[$i]."<br>";
	}
	echo "<br>";


	/* 关联数组 */
	$age = array("Peter" => "35", "Ben" => "37", "Joe" => "43");
	/*$age["Peter"] = "35";
	$age["Ben"] = "37";
	$age["Joe"] = "43";*/
	// 遍历关联数组
	foreach ($age as $key => $value) {
		echo $key.", ".$value."<br>";
	}
	echo "<br>";


	# PHP 数组的排序函数
	#	sort() - 以升序对数组排序
	#	rsort() - 以降序对数组排序
	#	asort() - 根据值，以升序对关联数组进行排序
	#	ksort() - 根据键，以升序对关联数组进行排序
	#	arsort() - 根据值，以降序对关联数组进行排序
	#	krsort() - 根据键，以降序对关联数组进行排序
	
	echo "对数组进行升序排序 - sort()"."<br>";
	sort($cars);
	for ($i = 0; $i < $arrayLength; $i++) { 
		echo $cars[$i]."<br>";
	}
	echo "<br>";

	echo "对数组进行降序排序 - rsort()"."<br>";
	rsort($cars);
	for ($i = 0; $i < $arrayLength; $i++) { 
		echo $cars[$i]."<br>";
	}
	echo "<br>";

	echo "根据值对数组进行升序排序 - asort()"."<br>";
	asort($age);
	foreach ($age as $key => $value) {
		echo $key.", ".$value."<br>";
	}
	echo "<br>";

	echo "根据键对数组进行升序排序 - ksort()"."<br>";
	ksort($age);
	foreach ($age as $key => $value) {
		echo $key.", ".$value."<br>";
	}
	echo "<br>";

	echo "根据值对数组进行降序排序 - arsort()"."<br>";
	arsort($age);
	foreach ($age as $key => $value) {
		echo $key.", ".$value."<br>";
	}
	echo "<br>";

	echo "根据键对数组进行降序排序 - krsort()"."<br>";
	krsort($age);
	foreach ($age as $key => $value) {
		echo $key.", ".$value."<br>";
	}
	echo "<br>";
?>