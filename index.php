<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>留言板</title>
    <style>
        div.card {
            margin-left: 280px; margin-top: 0px; margin-bottom: 20px;
            text-align: center;
            width: 800px;
            font-weight: normal;
            /* box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.4), 0 6px 20px 0 rgba(0, 0, 0, 0.19); */
        }

        div.header {
            text-align: left;
            font-size: 18px;
            height: 40px;
            padding: 10px;
        }

        div.container {
            text-align: left;
            height:150px;
            color: black;
            padding: 14px;
            font-size: 18px;
            margin: 5px;
            background-color: #f2f2f2;
            
        }

        ul.pagination {
            margin-left: 560px;
            display: inline-block;
            padding: 0;
        }

        ul.pagination li {
            display: inline;
            margin: 10;
        }

        ul.pagination li a {
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
            transition: background-color .3s;
            border: 1px solid #ddd;
            font-size: 18px;
        }

        ul.pagination li a.active {
            background-color: #eee;
            color: black;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <header class="topbar">
		<h1 style="text-align: center">留言板</h1>
            <ul class="pagination" style="text-align: center">
                <li><a href="" class="active">所有留言</a></li>
                <li><a href="add-front.php">添加留言</a></li>
            </ul>
    </header>
    <br>
    <div class="card" style="text-align: center">
        <?php
        include('config.php');
        spl_autoload_register(function($Message){
            if (is_file($Message . '.class.php')) {
                require $Message . '.class.php';
            }
        });
        
        session_start();
        $sql = "SELECT * FROM content ORDER BY date_time";
        $result = mysqli_query($link, $sql);
        $message = new Message();

        $act = $_GET['act'];
        switch($act) {
            case 'addMsg':
                //处理留言的添加
                $username = $_SESSION['username'];
                $messages = $_POST['messages'];
                $date_time = date('Y-m-d H:i:s');
                $message->addMsg($username, $messages, $date_time);
            break;
            case 'delMsg':
                //处理留言的删除
                $id = $_GET['id'];
                $message->delMsg($id);
            break;
            case 'modMsg':
                //处理留言的修改
                $id = $_GET['id'];
                $new_messages = $_POST['new_messages'];
                $message->modMsg($id, $new_messages);
            break;
        }

        while ($row = $result->fetch_row()) {
        ?>
            <div class="header">
                <p>
                    <?php
                    echo $row[1], "&nbsp;&nbsp;发布时间： ", $row[3], "&nbsp;&nbsp;";
                    if ($row[1] = $_SESSION['username']) {
                        ?>
                        <a href="modify-front.php?id=<?php echo $row[0]?>&messages=<?php echo $row[2]?>">修改留言</a>
                        <a href="index.php?act=delMsg&id=<?php echo $row[0]?>">删除留言</a>
                        <?php
                    }
                    ?>
                </p>
            </div>
            <div class="container">
                <?php
                    echo $row[2];
                ?>
            </div>
        <?php 
    } 
    ?>
</body>
</html>