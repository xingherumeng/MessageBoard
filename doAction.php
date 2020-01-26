<?php
/**
 * 处理用户登录
 * 登录成功跳转到index.php
 * 登录失败跳转到login-front.php
 */
$username = $_POST['username'];
$password = md5($_POST['password']);
$autoLogin = $_POST['autoLogin'];

$link = mysqli_connect('localhost', 'root', 'root') or die('Connect Error');
mysqli_set_charset($link, 'utf8');
mysqli_select_db($link, 'test') or die('Database Open Error');

$sql = "SELECT id, username FROM user WHERE username='{$username}' && password = '{$password}' ";
// echo $sql;
// $rc = mysqli_affected_rows($link);
// echo "受影响条数: " . $rc;

// $sql = mysqli_escape_string($link, $sql);
$result = mysqli_query($link, $sql);
var_dump($result);

if (mysqli_num_rows($result) == 1) {
	// if ($autoLogin == 1) {
			$row = mysqli_fetch_assoc($result);
			setcookie('username', $username, strtotime(	('+7 days')));
			$salt = 'king';
			$auth = md5($username.$password.$salt).":".$row['id'];
			setcookie('auth', $auth, strtotime('+7 days'));
	// 	} 
		// else {
			// setcookie('username', $username);
		// }	
		exit("<script>
			alert('登录成功');
			location.href = 'index.php';
			</script>");
} else {
	exit("<script>
		alert('登录失败');
		location.href = 'login-front.php';
		</script>
		");
}