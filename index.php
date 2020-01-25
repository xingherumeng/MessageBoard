<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>留言板</title>
    <style>
        div.card {
            width: 400px;
            font-weight: normal;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.4), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            text-align: center;
        }

        div.header {
            height:300px;
            color: black;
            padding: 5px;
            font-size: 18px;
        }

        div.container {
            font-size: 18px;
            background-color: #e5eecc;
            height: 50px;
            padding: 10px;
        }
        
        ul.pagination {
            display: inline-block;
            padding: 0;
            margin: 0;
        }

        ul.pagination li {display: inline;}

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
        
        <div class="container">
            <p>author 2020-1-22</p>
        </div>
        <div class="header">
            content<br>content
        </div>        

    </div>
    <br>
</body>
</html>