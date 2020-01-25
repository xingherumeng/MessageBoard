<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>留言板</title>
    <style>
        div.card {
            width: 800px;
            font-weight: normal;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.4), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            text-align: center;
        }

        div.header {
            height:200px;
            color: black;
            padding: 5px;
            font-size: 18px;
            margin: 5;
        }

        div.container {
            font-size: 18px;
            background-color: #e5eecc;
            height: 50px;
            padding: 10px;
            margin: 5;
        }
        
        ul.pagination {
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
		<h1>留言板</h1>
            <ul class="pagination">
                <li><a href="" class="active">所有留言</a></li>
                <li><a href="add-front.php">添加留言</a></li>
            </ul>
    </header>
    <br>
    <div class="card">
        <?php
        $link = mysqli_connect('localhost', 'root', 'root') or die('Connect error');
        mysqli_set_charset($link, 'utf8');
        mysqli_select_db($link, 'test') or die('Database Open Error');
        $sql = "SELECT * FROM content ORDER BY time";
        $result = mysqli_query($link, $sql);
        while ($row = $result->fetch_row()) {
        ?>
            <div class="container">
                <p>
                    <?php
                    echo $row[0],"&nbsp;&nbsp;",$row[2];
                    ?>
                </p>
            </div>
            <div class="header">
                <?php
                echo $row[1];
                ?>
            </div>

        <?php } ?>
</body>
</html>