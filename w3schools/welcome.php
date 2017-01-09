<!DOCTYPE html>
<html>
<head>
	<title>welcome</title>
</head>
<body>
<h1>欢迎页面</h1>
<h2>POST接收</h2>
Welcome <?php echo $_POST["name"]; ?><br>
Ur email is <?php echo $_POST["email"]; ?>
<h2>GET接收</h2>
Welcome <?php echo $_GET["name"]; ?><br>
Ur email is <?php echo $_GET["email"]; ?>
</body>
</html>