<?php // 多值参数 ?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
    Select your personality attributes:<br>
    <input type="checkbox" name="attributes[]" value="perky">Perky<br>
    <input type="checkbox" name="attributes[]" value="morose">Morose<br>
    <input type="checkbox" name="attributes[]" value="thinking">Thinking<br>
    <input type="checkbox" name="attributes[]" value="feeling">Feeling<br>
    <input type="checkbox" name="attributes[]" value="thrifty">Spend-thrift<br>
    <input type="checkbox" name="attributes[]" value="shopper">Shopper<br><br>
    <input type="submit" name="s" value="Record my personality!"><br>
</form>
<?php
if (array_key_exists('s', $_GET)) {
    $description = join(' ', $_GET['attributes']);
    echo "You have a {$description} personality.";
}
?>
