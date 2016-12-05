<!DOCTYPE html>
<html>
<head>
	<title>表单验证 -- 必填字段</title>
	<style type="text/css">
		.error {
			color: red;
		}
	</style>
</head>
<body>
<?php
	$name = $email = $gender = $comment = $website = "";
	$nameErr = $emailErr = $genderErr = $websiteErr = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["name"])) {
			$nameErr  = "Name is required";
		} else {
			$name = test_input($_POST["name"]);
		}
		if (empty($_POST["email"])) {
			$emailErr = "Email is required";
		} else {
			$email = test_input($_POST["email"]);
		}
		if (empty($_POST["website"])) {
			$website = "";
		} else {
			$website = test_input($_POST["website"]);
		}
		if (empty($_POST["comment"])) {
			$comment = "";
		} else {
			$comment = test_input($_POST["comment"]);
		}
		if (empty($_POST["gender"])) {
			$genderErr = "Gender is required";
		} else {
			$gender = test_input($_POST["gender"]);
		}
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
Name: <input type="text" name="name"><span class="error"> * <?php echo $nameErr; ?></span><br>
E-mail: <input type="text" name="email"><span class="error"> * <?php echo $emailErr; ?></span><br>
Website: <input type="text" name="website"><span class="error"><?php echo $websiteErr; ?></span><br>
<!-- textarea要有结束标签配对 -->
Comment: <textarea name="comment" rows="5" cols="40"></textarea><br>
Gender: <input type="radio" name="gender" value="female">Female<input type="radio" name="gender" value="male">Male<span class="error"> * <?php echo $genderErr; ?></span><br>
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