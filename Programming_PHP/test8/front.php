<?php
include_once "Log.php";
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Front Page</title>
</head>
<body>
<?php
$now = strftime("%c");

if (!isset($_SESSION["l"])) {
    if (!file_exists("./tmp")) {
        mkdir("./tmp/");
    }

    $logger = new Log("./tmp/persistent_log");

    $_SESSION["l"] = "";

    $logger->write("Created $now");

    echo "<p>Created session and persistent log object.</p>";

    $logger->write("Viewed first page {$now}");

    echo "<p>The log contains:</p>";

    echo nl2br($logger->read()); // 在字符串所有新行之前插入 HTML 换行标记
}
?>
<a href="next.php">Move to the next page</a>
</body>
</html>
