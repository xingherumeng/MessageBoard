<?php
/**
 * 处理用户登录
 * 登录成功跳转到index.php
 * 登录失败跳转到login-front.php
 */
include('config.php');
global $pdo;
session_start();
$username = $_POST['username'];
$password = md5($_POST['password']);

$select=$pdo->prepare("SELECT id, username FROM user WHERE username=:username and password =:password");
$select->execute(array(
	":username"=>$username,
	":password"=>$password,
));
if ($select->rowCount() == 1) {
	$row = $select->fetch();
	$salt = 'king';
	$auth = md5($username.$password.$salt).":".$row['id'];
	$_SESSION['auth'] = $auth;
	$_SESSION['username'] = $row['username'];
	$_SESSION['isLogin'] = 1;
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