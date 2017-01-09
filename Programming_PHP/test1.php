<?php
function hasRequired($array, $requiredFields)
{
    // 表单提交的所有字段名
    $keys = array_keys($array);

    // 遍历要求的字段名
    foreach ($requiredFields as $fieldName) {
        if (!in_array($fieldName, $keys) || empty($_POST[$fieldName])) {
            return false;
        }
    }

    return true;
}

if (isset($_POST['submitted'])) {
    $fields = array('name', 'email_address',);
    echo '<p>You ';
    echo hasRequired($_POST, $fields) ? 'did' : 'did not';
    echo ' have all the required fields.</p>';
}
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <p>Name: <input type="text" name="name"><br>
        Email address: <input type="text" name="email_address"><br>
        Age (optional): <input type="text" name="age"></p>
    <p align="<!-- center -->">
        <input type="submit" name="submitted" value="submit">
    </p>
</form>
