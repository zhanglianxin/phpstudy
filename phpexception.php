<?php
	# 异常 用于在指定的错误发生时改变脚本的正常流程

	#	当异常被触发时，通常会发生：
	#	当前代码状态被保存
	#	代码执行被切换到预定义的异常处理器函数
	#	根据情况，处理器也许会从保存的代码状态重新开始执行代码，终止脚本执行，或从代码中另外的位置继续执行脚本

	#	我们将展示不同的错误处理方法：
	#	异常的基本使用
	#	创建自定义的异常处理器
	#	多个异常
	#	重新抛出异常
	#	设置顶层异常处理器

	/* 异常的基本使用 */
	// 创建可抛出一个异常的函数
	function checkNum($number) {
		if ($number > 1) {
			throw new Exception("Value must be 1 or below<br>");
		}
		return true;
	}
	// 在 try 代码块中触发异常
	try {
		checkNum(2);
	} catch (Exception $e) {
		echo "Message: ".$e->getMessage();
	}
?>