<?php // 粘性多值参数 ?>
<?php
$attrs = isset($_GET['attributes']) ? $_GET['attributes'] : null;
if (!is_array($attrs)) $attrs = array();
function makeCheckboxes($name, $query, $options)
{
    foreach ($options as $value => $lable) {
        $checked = in_array($value, $query) ? "checked" : "";
        echo '<input type="checkbox" name="{$name}" value="{$value}" "{$checked}">';
        echo "{$lable}<br>";
    }
}

$personalityAttributes = array(
    "perky" => "Perky",
    "morose" => "Morose",
    "thinking" => "Thinking",
    "feeling" => "Feeling",
    "thrify" => "Spend-thrify",
    "prodigal" => "Shopper"
);
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
    Select your personality attributes:<br>
    <?php makeCheckboxes("attributes", $attrs, $personalityAttributes); ?><br>
    <input type="submit" name="s" value="Record my personality!"><br>
</form>
<?php
if (array_key_exists('s', $_GET)) {
    $description = join(' ', $_GET['attributes']);
    echo "You have a {$description} personality.";
}
?>
