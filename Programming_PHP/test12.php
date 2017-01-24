<?php
/* 图像 */
/*
 * 读取已有的文件
 */
//$filename = "";
//$image = imagecreatefromgif($filename);
//$image = imagecreatefromjpeg($filename);
//$image = imagecreatefrompng($filename);

/*
 * 创建和绘制图像
 */
// 创建图片
$image = imagecreate(200, 200);
// 分配颜色
$white = imagecolorallocate($image, 0xff, 0xff, 0xff);
$black = imagecolorallocate($image, 0x00, 0x00, 0x00);
// 画出图片，指定填充颜色
//imagefilledrectangle($image, 50, 50, 150, 150, $black);
// 在图片上添加文本
//imagestring($image, 5, 50, 160, "A Black Box", $black);
// GD 内建字体
imagestring($image, 1, 10, 10, "Font 1: ABCDEfghij", $black);
imagestring($image, 2, 10, 30, "Font 2: ABCDEfghij", $black);
imagestring($image, 3, 10, 50, "Font 3: ABCDEfghij", $black);
imagestring($image, 4, 10, 70, "Font 4: ABCDEfghij", $black);
imagestring($image, 5, 10, 90, "Font 5: ABCDEfghij", $black);

/*
 * 图片格式支持检查
 */
if (imagetypes() & IMG_PNG) {
    header("Content-Type: image/png");
    // 保存或发送图片
    imagepng($image);
} else if (imagetypes() & IMG_JPEG) {
    header("Content-Type: image/jpeg");
    // 保存或发送图片
    imagejpeg($image);
} else if (imagetypes() & IMG_GIF) {
    header("Content-Type: image/gif");
    // 保存或发送图片
    imagegif($image);
}

?>
