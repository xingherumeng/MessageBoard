<body>
	<h1 class='text-center'>登录界面</h1>
	<form method="post" action="doAction.php">
		<fieldset class="form-group">
			<label for="username">用户名</label>
			<input type="text" name="username" class="form-control" id="password">
		</fieldset>
		<fieldset class="form-group">
			<label for="password">密码</label>	
			<input type="password" name="password" class="form-control" id="password">		
		</fieldset>

<!-- 		<div class="checkbox">
			<label>
				<input type="checkbox" name="autologin" value="1">一周内自动登录
			</label>
		</div> -->

		<button type="submit" class="btn btn-primary">立即登录</button>
	</form>
</body>