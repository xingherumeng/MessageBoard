<?php
/**
 * 接收add-front.php中传入的留言数据$messages
 * 将留言数据写入数据表content中
 */

$username = $_COOKIE['username'];
$messages = $_POST['messages'];

$link = mysqli_connect('localhost', 'root', 'root', 'test') or die('Connect error');
$sql = "INSERT into content(username, messages) VALUES('$username', '$messages')";

// echo $sql;
if (mysqli_query($link, $sql)) {
    echo "<script>alert(\"插入成功!\")</script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}
// $result = $link->exec($link, $sql);
// $row = mysqli_fetch_assoc($result);