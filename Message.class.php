<?php
/**
 * 封装了Message类
 * 添加留言：接收add-front.php中传入的留言数据，act=addMsg，调用addMsg
 * 删除留言：act=delMsg，调用delMsg
 * 修改留言：待完善
 */
require_once 'config.php';
session_start();

class Message
{
    public $username;
    public $messages;
    public $date;

    function addMsg($username, $messages, $date)
    {
        $sql = "INSERT into content(username, messages, time) VALUES('$username', '$messages', '$date')";
        $result = config($sql);

        if ($result == 1) {
            exit("<script>
                alert('插入成功');
                location.href = 'index.php';
                </script>
                ");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($link);
            exit("<script>
                alert('插入失败');
                location.href = 'add-front.php';
                </script>
                ");
        }
    }
    function delMsg($username, $messages, $time)
    {
        $link = mysqli_connect('localhost', 'root', 'root') or die('Connect Error');
        $sql = "DELETE FROM content WHERE username='{$username}' && messages = '{$messages}' && time = '{$time}'";
        $result = config($sql);
        var_dump($link);

        if (mysqli_affected_rows($link)) {
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
    }
}

$message = new Message();
$act = $_GET['act'];
switch($act) {
    case 'addMsg':
        //处理留言的添加
        $username = $_SESSION['username'];
        $messages = $_POST['messages'];
        $date = date('Y-m-d H:i:s');

        $message->addMsg($username, $messages, $date);
    break;
    case 'delMsg':
        //处理留言的删除
        $username = $_GET['username'];
        $messages = $_GET['messages'];
        $time = $_GET['time'];

        $message->delMsg($username, $messages, $time);
    break;
}