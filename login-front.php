<!DOCTYPE html>
<html>
<head>
	<title>登录界面</title>
	<style>
		div {
			text-align: center;
		}

		button {
			background-color: #9fe49a;
			border: none;
			outline-style: none ;
			color: white;
			width: 300px;
			padding: 15px 32px;
			text-decoration: none;
			display: inline-block;
			font-size: 18px;
			border-radius: 8px;
		}

		input {
			padding-left: 20px; 
			outline-color: invert;
			outline-style: none;
			height: 30px;
			width: 300px;
			font-size: 18px;
			border: 1px solid #ccc; 
			background-color: white;
			margin: 5px;
			padding: 7px 0px;	
			border-radius: 6px;
			text-indent: 10px;
		}

		input:focus {
			border-color: #62b066;
			outline: 0;
			/* -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6); */
			box-shadow: inset 0 1px 1px rgba(0,0,0,.075); /*,0 0 8px rgba(102,175,233,.6)*/
		}
	</style>
</head>
<body>
	<h1 style="text-align: center">登录</h1>
	<form method="post" action="doAction.php">
		<div class="form-group">
			<input type="text" name="username" class="form-control" id="password" placeholder="请输入用户名">
		</div>
		<br>
		<div class="form-group">
			<input type="password" name="password" class="form-control" id="password" placeholder="请输入密码">		
		</div>
		<br><br>
<!-- 	<div class="checkbox">
			<label>
				<input type="checkbox" name="autologin" value="1">一周内自动登录
			</label>
		</div> -->
		<div>
			<button type="submit" class="button">立即登录</button>
		</div>
	</form>
</body>