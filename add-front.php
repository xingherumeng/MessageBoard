<?php
/**
 * 添加留言的前端代码
 * 如果未登录则跳转到login-front.php
 * 将留言提交到addMsg.php
 */

// 先插入一条记录zz
$sql = 'INSERT user(username, password, email) VALUES("zz", "'.md5('zz').'", "2333@qq.com")';

// 如果未登录就跳转到login-front.php
    if (!isset($_COOKIE['username'])) {
        exit("<script>
            alert('请先登录');
            location.href = 'login-front.php';
            </script>");
    }
    // 校验用户登录凭证
    if (isset($_COOKIE['auth'])) {
        $auth = $_COOKIE['auth'];
        $resArr = explode(':', $auth);  //拆分后的数组
        $userId = end($resArr); 
        $link = mysqli_connect('localhost', 'root', 'root') or die('Connect error');
        mysqli_set_charset($link, 'utf8');
        mysqli_select_db($link, 'test') or die('Database Open Error');
        $sql = "SELECT id, username, password FROM user WHERE id = $userId";
        $result = mysqli_query($link, $sql);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $username = $row['username'];
            $password = $row['password'];
            $salt = 'king';
            $authStr = md5($username.$password.$salt);
            //.表示字符串拼接
            if ($authStr != $resArr[0]) {
                exit("<script>
                    alert('请先登录')；
                    location.href = 'login-front.php';
                    </script>");
            }
        } else {
            exit("<script>
                alert('请先登录');
                location.href = 'login-front.php'
                </script>");
        }
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>添加留言</title>
    <style> 
        .textarea {
            border:1px solid #d1d1d1;
            padding:10px 50px; 
            width:300px;
        }
        .button {
            color: white;
            padding: 5px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 18px;
            transition-duration: 0.4s;
            cursor: pointer;
            color: black;
        }
    </style>
</head>

<body>
    <section class="contact-w3layouts jarallax" id="contact" >
    <div class="container">
        <h3 class="text-center">添加留言</h3>
        <div> 
            <form method="POST" action="addMsg.php">
                <div class="form-group"> 
                    <div class="control-group">
                        <div class="control">
                            <label for="messages">想说的话:</label><br>
                            <textarea rows="10" cols="80" class="form-control" id="messages" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none" name="messages"></textarea>
                        </div>
                    </div>
                </div>  
                <div class="button">    
                    <button type="submit" class="button">提交</button>
                </div> 
            </form>
        </div>
        <div class="clearfix"></div>
    </div>
    </section>
</body>
</html>
