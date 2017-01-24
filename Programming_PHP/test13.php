<html>
<body bgcolor="#000">
<tt><?php
/* 图像的文本形式 */
$image = imagecreatefrompng("./smalllogo.png");

$dx = imagesx($image);
$dy = imagesy($image);

for ($y = 0; $y < $dy; $y++) {
    for ($x = 0; $x < $dx; $x++) {
        $colorIndex = imagecolorat($image, $x, $y);
        $rgb = imagecolorsforindex($image, $colorIndex);

        printf('<font color=#%02x%02x%02x>#</font>', $rgb['red'], $rgb['green'], $rgb['blue']);
    }
    echo "<br>\n";
}
?></tt>
</body>
</html>
