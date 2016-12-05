﻿<?php
    # PHP 过滤器用于验证和过滤来自非安全来源的数据
    #    什么是外部数据？
    #        来自表单的输入数据
    #        Cookies
    #        服务器变量
    #        数据库查询结果

    /* 函数和过滤器 */
    /*
    filter_var() - 通过一个指定的过滤器来过滤单一的变量
    filter_var_array() - 通过相同的或不同的过滤器来过滤多个变量
    filter_input - 获取一个输入变量，并对它进行过滤
    filter_input_array - 获取多个输入变量，并通过相同的或不同的过滤器对它们进行过滤
    */
    /*
    Validating 过滤器：
    用于验证用户输入
    严格的格式规则（比如 URL 或 E-Mail 验证）
    如果成功则返回预期的类型，如果失败则返回 FALSE
    Sanitizing 过滤器：
    用于允许或禁止字符串中指定的字符
    无数据格式规则
    始终返回字符串
    */
?>
