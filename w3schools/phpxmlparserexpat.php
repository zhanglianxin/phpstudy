<?php
    # PHP XML Expat 解析器
    #
    # 基于树的解析器：把 XML 文档转换为树型结构。
    #   它分析整篇文档，并提供了 API 来访问树中的元素，例如 DOM 。
    # 基于事件的解析器：将 XML 文档视为一系列的事件。
    #   当某个具体的事件发生时，解析器会调用函数来处理。

    # Expat 解析器是基于事件的解析器。
    # 基于事件的解析器集中在 XML 文档的内容，而不是它们的结果。
    # 正因如此，基于事件的解析器能够比基于树的解析器更快地访问数据。

    // 初始化 XML 解析器
    $parser = xml_parser_create();
    // var_dump($parser); // resource(2) of type (xml)

    // 定义处理元素开头标签的函数
    function startTAG($parser, $element_name, $element_attrs) {
        switch ($element_name) {
            // element_name must be upper case character
            case "CHANNEL":
                echo "=== channel ==="."<br>";
                break;
            case "ITEM":
                echo "--- item ---"."<br>";
                break;
            case "TITLE":
                echo "title: ";
                break;
            case "DESCRIPTION":
                echo "description";
                break;
            case "IMAGE":
                echo "image: ";
                break;
            case "TYPE":
                echo "type: ";
                break;
            case "COMMENT":
                echo "comment: ";
                break;
            
            default:
                break;
        }
    }

    // 定义处理元素开头标签的函数
    function endTAG($parser, $element_name) {
        if ($element_name == "CHANNEL") {
            echo "=== channel ==="."<br>";
        } else if ($element_name == "ITEM") {
            echo "--- item ---"."<br>";
        } else {
            echo "<br>";
        }
        
    }

    // 定义处理字符数据的函数
    function elementData($parser, $data) {
        echo $data;
    }

    // 指定元素处理器
    xml_set_element_handler($parser, "startTAG", "endTAG");

    // 指定字符数据处理器
    xml_set_character_data_handler($parser, "elementData");

    $fp = fopen("../upload/news.xml", "r");

    while ($data = fread($fp, 4096)) {
        // 解析数据块（解析器，数据，是否为当前解析的最后一段数据）
        xml_parse($parser, $data, feof($fp)) or die(
            sprintf("XML Error: %s at line %d", 
                xml_error_string(xml_get_error_code($parser)), 
                xml_get_current_line_number($parser)
            )
        );
    }

    // 释放 XML 解析器
    xml_parser_free($parser);

    /*** this is one beautiful dividing line ***/
    echo "<hr>";

    $parser = xml_parser_create();
    // var_dump($parser); // resource(5) of type (xml)

    function startTAG2($parser, $element_name, $element_attrs) {
        switch ($element_name) {
            case "RSS":
                echo "=== rss ==="."<br>";
                break;
            case "CHANNEL":
                echo "=== channel ==="."<br>";
                break;
            case "ITEM":
                echo "--- item ---"."<br>";
                break;
            case "TITLE":
                echo "title: ";
                break;
            case "LINK":
                echo "link: ";
                break;
            case "DESCRIPTION":
                echo "description: ";
                break;
            case "COPYRIGHT":
                echo "copyright: ";
                break;
            case "GENERATOR":
                echo "generator: ";
                break;
            case "LASTBUILDDATE":
                echo "lastBuildDate: ";
                break;
            case "IMAGE":
                echo "--- image ---"."<br>";
                break;
            case "URL":
                echo "url: ";
                break;
            case "AUTHOR":
                echo "author: ";
                break;
            case "CATEGORY":
                echo "category: ";
                break;
            case "PUBDATE":
                echo "pubdate: ";
                break;            
            
            default:
                
                break;
        }
    }

    function endTAG2($parser, $element_name) {
        switch ($element_name) {
            case "RSS":
                echo "=== rss ==="."<br>";
                break;
            case "CHANNEL":
                echo "=== channel ==="."<br>";
                break;
            case "ITEM":
                echo "--- item ---"."<br>";
                break;
            case "IMAGE":
                echo "--- image ---"."<br>";
                break;
            default:
                echo "<br>";
                break;
        }
        
    }

    function startTAG22($parser, $element_name, $element_attrs) {
        switch ($element_name) {
            case "RSS":
            case "CHANNEL":
                echo "=== ".$element_name." ==="."<br>";
                break;
            case "ITEM":
            case "IMAGE":
                echo "--- ".$element_name." ---"."<br>";
                break;
            default:
                echo $element_name.": ";
                break;
        }
    }

    function endTAG22($parser, $element_name) {
        switch ($element_name) {
            case "RSS":
            case "CHANNEL":
                echo "=== ".$element_name." ==="."<br>";
                break;
            case "ITEM":
            case "IMAGE":
                echo "--- ".$element_name." ---"."<br>";
                break;
            default:
                echo "<br>";
                break;
        }
        
    }

    function elementData2($parser, $data) {
        echo $data;
    }

    xml_set_element_handler($parser, "startTAG2", "endTAG2");

    xml_set_character_data_handler($parser, "elementData2");

    $fp = fopen("../upload/rss.xml", "r");

    while ($data = fread($fp, 4096)) {
        xml_parse($parser, $data, feof($fp)) or die(
            sprintf("XML Error: %s at line %d", 
                xml_error_string(xml_get_error_code($parser)), 
                xml_get_current_line_number($parser)
            )
        );
    }

    xml_parser_free($parser);
?>
