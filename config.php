<?php
/**
 * 处理数据库的连接
 * 选择数据库test
 * 返回sql语句的执行结果$result
 */
function config($sql) {
    $link = mysqli_connect('localhost', 'root', 'root') or die('Connect Error');
    mysqli_set_charset($link, 'utf8');
    mysqli_select_db($link, 'test') or die('Database Open Error');
    $result = mysqli_query($link, $sql);
    return $result;
}
