<?php
	# 处理上传文件

	if ($_FILES["file"]["error"] > 0) {
		echo "Error: ".$_FILES["file"]["error"]."<br>";
	} else {
		echo "Upload: ".$_FILES["file"]["name"]."<br>";
		echo "Type: ".$_FILES["file"]["type"]."<br>";
		echo "Size: ".($_FILES["file"]["size"] / 1024)." KB<br>";
		echo "Stored in: ".$_FILES["file"]["tmp_name"]."<br>";

		$dest = "upload/".$_FILES["file"]["name"];
		// 检查上传路径中文件是否已经存在
		if (file_exists($dest)) {
			echo $_FILES["file"]["name"]." already exists.";
		} else {
			// 从临时路径中移动上传文件到指定路径
			move_uploaded_file($_FILES["file"]["tmp_name"], $dest);
			echo "Stored in: ".$dest;
		}
	}
?>