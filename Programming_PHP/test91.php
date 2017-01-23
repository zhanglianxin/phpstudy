<?php // 自处理页面 ?>
<?php $fahrenheit = isset($_GET['fahrenheit']) ? $_GET['fahrenheit'] : null;
if (is_null($fahrenheit)) { ?>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
        Fahrenheit temperature: <input type="number" name="fahrenheit"><br>
        <input type="submit" value="Convert to Celsius!">
    </form>
<?php } else {
    $celsius = ($fahrenheit - 32) * 5 / 9;
    printf("%.2fF is %.2fC", $fahrenheit, $celsius);
} ?>
