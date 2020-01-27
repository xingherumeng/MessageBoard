<?php
/**
 * 处理留言的删除
 * 将username等参数用get方式传入
 */

$username = $_GET['username'];
$messages = $_GET['messages'];
$time = $_GET['time'];
echo $username;
echo $messages;
echo $time;

$link = mysqli_connect('localhost', 'root', 'root') or die('Connect Error');
mysqli_set_charset($link, 'utf8');
mysqli_select_db($link, 'test') or die('Database Open Error');
$sql = "DELETE FROM content WHERE username='{$username}' && messages = '{$messages}' && time = '{$time}'";
$result = mysqli_query($link, $sql);

if (mysqli_affected_rows($link) == 1) {
    exit("<script>
        alert('删除成功');
        location.href = 'index.php';
        </script>
        ");
} else {
    exit("<script>
        alert('删除失败');
        location.href = 'index.php';
        </script>
        ");
}