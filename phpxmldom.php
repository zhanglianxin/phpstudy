<?php
    # PHP XML DOM 解析器
    #
    # 基于树的解析器：把 XML 文档转换为树型结构。
    #   它分析整篇文档，并提供了 API 来访问树中的元素，例如 DOM 。
    # 基于事件的解析器：将 XML 文档视为一系列的事件。
    #   当某个具体的事件发生时，解析器会调用函数来处理。

    # DOM 解析器是基于树的解析器。
    # 基于事件的解析器集中在 XML 文档的内容，而不是它们的结果。
    # 正因如此，基于事件的解析器能够比基于树的解析器更快地访问数据。

    // 初始化 XML 解析器
    $xmlDoc = new DOMDocument();
    // 加载 XML 文档
    $xmlDoc -> load("upload/news.xml");

    // 保存 XML 
    $str = $xmlDoc -> saveXML();
    echo $str;

    echo "<hr>";

    $x = $xmlDoc -> documentElement;
    foreach ($x -> childNodes as $item) {
        if ($item -> nodeName != "#text") {
            if ($item -> nodeValue) {
                echo $item -> nodeName." = ".$item -> nodeValue."<br>";
            }
        }
    }
?>