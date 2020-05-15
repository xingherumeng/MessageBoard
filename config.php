<?php
/**
 * 处理数据库的连接
 */

$config = [
    'db_dsn' => 'mysql:host=localhost; dbname=test',
    // 'db_host' => 'localhost',
    'db_user' => 'root',
    'db_pass' => 'root',
    // 'db_name' => 'test',
    'db_charset' => 'utf8',
];

try{
    global $pdo;
    $pdo = new PDO($config['db_dsn'], $config['db_user'], $config['db_pass'], array(PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8mb4"));
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
}catch (PDOException $e) {
    echo "Connect Error";
}

// $link = mysqli_connect($config['db_host'], $config['db_user'], $config['db_pass']) or die('Connect Error');
// mysqli_set_charset($link, $config['db_charset']);
// mysqli_select_db($link, $config['db_name']) or die('Database Open Error');