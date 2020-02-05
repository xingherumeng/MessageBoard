<?php
/**
 * 处理用户登录
 * 登录成功跳转到index.php
 * 登录失败跳转到login-front.php
 */
require_once 'config.php';

session_start();
$username = $_POST['username'];
$password = md5($_POST['password']);

$sql = "SELECT id, username FROM user WHERE username='{$username}' && password = '{$password}' ";
$result = config($sql);

if (mysqli_num_rows($result) == 1) {
	// if ($autoLogin == 1) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		$_SESSION['isLogin'] = 1;
		$salt = 'king';
		$auth = md5($username.$password.$salt).":".$row['id'];
		setcookie('auth', $auth, strtotime('+7 days'));
		exit ("<script>
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