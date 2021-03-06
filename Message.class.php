<?php
/**
 * 封装了Message类
 * 添加留言：接收add-front.php中传入的留言数据，act=addMsg，调用addMsg
 * 删除留言：act=delMsg，调用delMsg
 * 修改留言：接收modify-front.php中传入的留言数据，act=modMsg，调用modMsg
 */

session_start();

class Message
{
    public $username;
    public $messages;
    public $date_time;

    function addMsg($username, $messages, $date_time)
    {
        global $pdo;
        include('config.php');
        $select=$pdo->prepare("INSERT into content(username, messages, date_time) VALUES(:username, :messages, :date_time)");
        $select->execute(array(
            ":username"=>$username,
            ":messages"=>$messages,
            ":date_time"=>$date_time,
        ));

        if ($select->rowCount() == 1) {
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
    function delMsg($id)
    {
        global $pdo;
        include('config.php');
        $delete=$pdo->prepare("DELETE FROM content WHERE id=:id");
        $delete->execute(array(
            ":id"=>$id,
        ));

        if ($delete->rowCount()) {
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
    function modMsg($id, $new_messages)
    {
        global $pdo;
        include('config.php');
        $update=$pdo->prepare("UPDATE content SET messages =:new_messages WHERE id=:id");
        $update->execute(array(
            ":new_messages"=>$new_messages,
            ":id"=>$id,
        ));

        if ($update->rowCount() == 1) {
            exit("<script>
                alert('修改成功');
                location.href = 'index.php';
                </script>
                ");
        } else {
            exit("<script>
                alert('修改失败');
                location.href = 'index.php';
                </script>
                ");
        }
    }
}

// $message = new Message();
// $act = $_GET['act'];
// switch($act) {
//     case 'addMsg':
//         //处理留言的添加
//         $username = $_SESSION['username'];
//         $messages = $_POST['messages'];
//         $date_time = date('Y-m-d H:i:s');
//         $message->addMsg($username, $messages, $date_time);
//     break;
//     case 'delMsg':
//         //处理留言的删除
//         $id = $_GET['id'];
//         $message->delMsg($id);
//     break;
//     case 'modMsg':
//         //处理留言的修改
//         $id = $_GET['id'];
//         $new_messages = $_POST['new_messages'];
//         $message->modMsg($id, $new_messages);
//     break;
// }