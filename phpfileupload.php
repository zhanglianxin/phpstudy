<!DOCTYPE html>
<html>
<head>
	<title>PHP 文件上传</title>
</head>
<body>
	<form action="upload_file.php" method="post" enctype="multipart/form-data">
		<label for="file">Filename: </label>
		<input type="file" name="file" id="file"><br>
		<input type="submit" value="Submit">
	</form>
</body>
</html>