<?php
$name = isset($_POST['name']) ? $_POST['name'] : "";
$mediaType = isset($_POST['media_type']) ? $_POST['media_type'] : "";
$filename = isset($_POST['filename']) ? $_POST['filename'] : "";
$caption = isset($_POST['caption']) ? $_POST['caption'] : "";
$status = isset($_POST['status']) ? $_POST['status'] : "";
$tried = ((isset($_POST['tried']) ? $_POST['tried'] : "") == 'yes');
if ($tried) {
    $validated = !empty($name) && !empty($mediaType) && !empty($filename);
    if (!$validated) { ?>
        <p>The name, media type, and filename are required fields. Please fill them out to continue.</p>
    <?php }
}
if ($tried && $validated) {
    echo "<p>The item has been created.</p>";
}
function mediaSelected($type)
{
    global $mediaType;
    if ($mediaType == $type) {
        echo "selected";
    }
}

?>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
    Name: <input type="text" name="name" value="<?= $name; ?>"><br>
    Status: <input type="checkbox" name="status" value="active"
        <?php echo($status == "active" ? "echecked" : "") ?>>Active<br>
    Media: <select name="media_type">
        <option value="">Choose one</option>
        <option value="picture" <?php mediaSelected("picture") ?>>Picture</option>
        <option value="audio" <?php mediaSelected("audio") ?>>Audio</option>
        <option value="movie" <?php mediaSelected("movie") ?>>Movie</option>
    </select><br>
    File: <input type="text" name="filename" value="<?= $filename; ?>"><br>
    Caption: <textarea name="caption"><?= $caption; ?></textarea><br>
    <input type="hidden" name="tried" value="yes">
    <input type="submit" value="<?php echo $tried ? "Continue" : "Create"; ?>">
</form>
