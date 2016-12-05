<?php
	// 获得简单的日期
	echo "今天是 ".date("Y-M-D L")."<br>";
	echo "今天是 ".date("y-m-d l")."<br>";

	// 获得简单的时间
	echo "现在时间是 ".date("H:i:s")."<br>";
	echo "现在时间是 ".date("h:i:s A")."<br>";
	echo "现在时间是 ".date("h:i:s a")."<br>";

	$d1 = strtotime("January 1 2017");
	$d2 = ceil(($d1 - time()) / 60 / 60 / 24);
	echo "距离 2017 年 1 月 1 日还有 ".$d2." 天";

	echo '<br>毫秒数 ';
	echo sprintf('%03s', floor(microtime() * 1000));
	
	echo '<br>随机数 ';
	echo sprintf('%04s', rand(0, 9999)).'&nbsp;';
	echo sprintf('%04s', rand(0, 9999)).'&nbsp;';
	echo sprintf('%04s', rand(0, 9999)).'&nbsp;';
	echo sprintf('%04s', rand(0, 9999)).'&nbsp;';
	echo sprintf('%04s', rand(0, 9999)).'<br>';
?>
<!-- 自动版权年份 -->
<footer>© 2010-<?php echo date("Y")?></footer>