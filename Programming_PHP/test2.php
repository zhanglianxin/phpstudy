<?php
function userSort($a, $b)
{
    if ($b == "smarts") {
        return 1;
    } elseif ($a == "smarts") {
        return -1;
    } else {
        return $a == $b ? 0 : $a < $b ? -1 : 1;
    }
}

$values = array('name' => "Buzz Lightyear", 'email_address' => "buzz@starcommand.gal", 'age' => 32, 'smarts' => "some");

if (isset($_POST['submitted'])) {
    $sortType = $_POST['sort_type'];
    if ($sortType === "usort" || $sortType === "uksort" || $sortType === "uasort") {
        $sortType($values, "userSort");
    } else {
        $sortType($values);
    }
}
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <p>
        <label><input type="radio" name="sort_type" value="sort" checked> Standard<br></label>
        <label><input type="radio" name="sort_type" value="rsort"> Reverse<br></label>
        <label><input type="radio" name="sort_type" value="usort"> User-defined<br></label>
        <label><input type="radio" name="sort_type" value="ksort"> Key<br></label>
        <label><input type="radio" name="sort_type" value="krsort"> Reverse key<br></label>
        <label><input type="radio" name="sort_type" value="uksort"> User-defined key<br></label>
        <label><input type="radio" name="sort_type" value="asort"> Value<br></label>
        <label><input type="radio" name="sort_type" value="arsort"> Reverse value<br></label>
        <label><input type="radio" name="sort_type" value="uasort"> User-defined value<br></label>
    </p>
    <p>
        <input type="submit" value="Sort" name="submitted">
    </p>
    <p>
        Values <?= $_POST['submitted'] ? "sorted by {$sortType}" : "unsorted"; ?>:
    </p>
    <ul>
        <?php
        foreach ($values as $key => $value) {
            echo "<li><b>{$key}</b>: {$value}</li>";
        }
        ?>
    </ul>
</form>
