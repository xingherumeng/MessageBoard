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
            padding: 10px;
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
        require_once 'config.php';
        session_start();
        $sql = "SELECT * FROM content ORDER BY time";
        $result = config($sql);
        while ($row = $result->fetch_row()) {
        ?>
            <div class="header">
                <p>
                    <?php
                    echo $row[1], "&nbsp;&nbsp;发布时间： ", $row[3], "&nbsp;&nbsp;";
                    if ($row[1] = $_SESSION['username']) {
                        ?>
                        <a href="modify-front.php?username=<?php echo $row[1]?>&messages=<?php echo $row[2]?>&time=<?php echo $row[3]?>">修改留言</a>
                        <a href="Message.class.php?act=delMsg&username=<?php echo $row[1]?>&messages=<?php echo $row[2]?>&time=<?php echo $row[3]?>">删除留言</a>
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