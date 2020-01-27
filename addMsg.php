<?php
/**
 * 接收add-front.php中传入的留言数据$messages
 * 将留言数据写入数据表content中
 */

$username = $_COOKIE['username']; //这里不知道怎么传username
$messages = $_POST['messages'];

$link = mysqli_connect('localhost', 'root', 'root', 'test') or die('Connect error');
$date = date('Y-m-d H:i:s');
$sql = "INSERT into content(username, messages, time) VALUES('$username', '$messages', '$date')";

if (mysqli_query($link, $sql)) {
    exit("<script>
        alert('插入成功!');
		location.href = 'index.php';
        </script>
        ");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}
// $result = $link->exec($link, $sql);
// $row = mysqli_fetch_assoc($result);
