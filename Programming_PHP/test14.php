<?php
/* 生成 XML */
header("Content-Type: text/xml");
echo "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\n";
?>
<rss version="0.91">
    <channel>
        <?php
        $items = array(
            array(
                'title' => "Man Bites Dog",
                'link' => "http://www.example.com/dog.php",
                'desc' => "Ironic turnaround!"
            ), array(
                'title' => "Medical Breakthrough!",
                'link' => "http://www.example.com/doc.php",
                'desc' => "Doctors announced a cure for me."
            )
        );

        foreach ($items as $item) {
            echo "<item>\n" . "<title>{$item['title']}</title>\n" . "<link>{$item['link']}</link>\n"
                . "<description>{$item['desc']}</description>\n" . "<language>en-US</language>\n" . "</item>\n\n";
        }
        ?>
    </channel>
</rss>
