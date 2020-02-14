<?php
/**
 * 处理数据库的连接
 */

$config = [
    'db_host' => 'localhost',
    'db_user' => 'root',
    'db_pass' => 'root',
    'db_name' => 'test',
    'db_charset' => 'utf8',
];

$link = mysqli_connect($config['db_host'], $config['db_user'], $config['db_pass']) or die('Connect Error');
mysqli_set_charset($link, $config['db_charset']);
mysqli_select_db($link, $config['db_name']) or die('Database Open Error');