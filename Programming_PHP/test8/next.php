<?php
include_once "Log.php";
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Next Page</title>
</head>
<body>
<?php
$now = strftime("%c");

$logger = new Log("./tmp/persistent_log");

$logger->write("Viewd page 2 at {$now}");

echo "<p>The log contains: </p>";

echo nl2br($logger->read());
?>
</body>
</html>
