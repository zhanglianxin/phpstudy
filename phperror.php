<?php
	# PHP 错误处理
	#	简单的 die() 语句
	#	自定义错误和错误触发器
	#	错误报告

	/* 基本的错误处理 */
	if (!file_exists("hellophp")) {
		die("File not found.<br>");
	} else {
		$file = fopen("hellophp", "r");
	}

?>