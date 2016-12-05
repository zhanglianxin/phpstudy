<?php
    # PHP XML SimpleXML 解析器
    #
    # 基于树的解析器：把 XML 文档转换为树型结构。
    #   它分析整篇文档，并提供了 API 来访问树中的元素，例如 DOM 。
    # 基于事件的解析器：将 XML 文档视为一系列的事件。
    #   当某个具体的事件发生时，解析器会调用函数来处理。

    # SimpleXML 可把 XML 文档转换为对象：
    #   元素 - 被转换为 SimpleXMLElement 对象的单一属性。
    #          当同一级别上存在多个元素时，它们会被置于数组中。
    #   属性 - 通过使用关联数组进行访问，其中的下标对应属性名称。
    #   元素数据 - 来自元素的文本数据被转换为字符串。
    #          如果一个元素拥有多个文本节点，则按照它们被找到的顺序进行排列。

    // 加载 XML 文档
    $xml = simplexml_load_file("upload/news.xml");

    // 获取第一个元素的名称
    echo $xml -> getName()."<br>";

    // 遍历每个子节点
    foreach ($xml -> children() as $child) {
        // 遍历每个子节点的子节点
        foreach ($child -> children() as $element) {
            // 输出元素名称和数据
            echo $element -> getName().": ".$element."<br>";
        }
    }
?>
