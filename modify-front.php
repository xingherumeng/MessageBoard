<?php
/**
 * 修改留言的前端代码
 * 如果未登录则跳转到login-front.php
 * 将留言提交到Message.class.php
 */

require_once 'config.php';

session_start();
$username = $_GET['username'];
$messages = $_GET['messages'];
$time = $_GET['time'];
// 如果未登录就跳转到login-front.php
if (!isset($_SESSION['isLogin']) || !isset($_SESSION['username']) || !isset($_SESSION['auth'])) {
    exit("<script>
        alert('请先登录');
        location.href = 'login-front.php';
        </script>");
}

// 校验用户登录凭证
if (isset($_SESSION['auth'])) {
    $auth = $_SESSION['auth'];
    $resArr = explode(':', $auth);  //拆分后的数组
    $userId = end($resArr); 
    $sql = "SELECT id, username, password FROM user WHERE id = $userId";
    $result = config($sql);
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
    <title>修改留言</title>
    <style> 
        textarea {
            outline-style: none;
            border: 1px solid #b1c1a9;
            padding: 10px 20px; 
            width: 600px;
            font-size: 18px;
            font-family: "Microsoft YaHei"; 
        }

        button {
			background-color: #6abe64;
            color: white;
			width: 300px;
			padding: 15px 32px;
			border-radius: 8px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 18px;
			border: none;
		}
        
        div {
            text-align: center;
        }
    </style>
</head>

<body>
    <section class="contact-w3layouts jarallax" id="contact" >
    <div class="container">
        <h1 style="text-align: center">修改留言</h3>
        <div> 
            <form method="POST" action="Message.class.php?act=modMsg&messages=<?php echo $messages ?>&time=<?php echo $time ?>">
                <div class="form-group"> 
                    <textarea rows="10" placeholder="<?php echo $messages ?>" class="form-control" id="new_messages" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none" name="new_messages"></textarea>
                </div>  
                <br>
                <div class="button"> 
                    <button type="submit" class="button">修改</button>
                </div> 
            </form>
        </div>
        <div class="clearfix"></div>
    </div>
    </section>
</body>
</html>