<!DOCTYPE html>
<html>
<head>
	<title>表单验证</title>
</head>
<body>
<?php
	$name = $email = $gender = $comment = $website = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$name = test_input($_POST["name"]);
		$email = test_input($_POST["email"]);
		$website = test_input($_POST["website"]);
		$comment = test_input($_POST["comment"]);
		$gender = test_input($_POST["gender"]);
	}

	function test_input($data)
	{
		// 去除首尾空格
		$date = trim($data);
		// 去除转义斜杠
		$date = stripcslashes($data);
		// 把预定义的字符转为HTML实体
		$date = htmlspecialchars($data);

		return $data;
	}
?>
<!-- htmlspecialchars()函数把特殊字符转换为HTML实体 -->
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
Name: <input type="text" name="name"><br>
E-mail: <input type="text" name="email"><br>
Website: <input type="text" name="website"><br>
<!-- textarea要有结束标签配对 -->
Comment: <textarea name="comment" rows="5" cols="40"></textarea><br>
Gender: <input type="radio" name="gender" value="female">Female<input type="radio" name="gender" value="male" required="">Male<br>
<input type="submit">
</form>

<hr>
<?php
	echo $_REQUEST["name"]."<br>";
	echo $_REQUEST["email"]."<br>";
	echo $_REQUEST["website"]."<br>";
	echo $_REQUEST["comment"]."<br>";
	echo $_REQUEST["gender"]."<br>";
?>
</body>
</html>