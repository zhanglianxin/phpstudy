<?php
    # 处理上传多文件
    // var_dump($_FILES);exit;

    foreach ($_FILES as $filename => $file) {
        if ($file['error'] > 0) {
            echo 'Error: ' . $file['error'] . '<br>';
        } else {
            echo 'Upload: ' . $file['name'] . '<br>';
            echo 'Type: ' . $file['type'] . '<br>';
            echo 'Size: ' . ($file['size'] / 1024) . ' KB<br>';
            echo 'Stored in: '. $file['tmp_name'] . '<br>';

            $dest = '../upload/' . time() . $file['name'];
            // 检查上传路径中文件是否已经存在
            if (file_exists($dest)) {
                echo $file['name'] . ' already exists.';
            } else {
                // 从临时路径中移动上传文件到指定路径
                move_uploaded_file($file['tmp_name'], $dest);
                echo 'Stored in: ' . $dest;
            }
        }
        echo '<br><br>';
    }
