<?php
	// login.php 程序需要承担两个功能
	//  1 以get 方式发起请求 展示页面
	//  2 以post 方式请求 展示功能
	require '../function.php';
   
  	$message = '';

 	if(!empty($_POST)) {
	// 肯定是以 post 方式提交的
		
	$email = $_POST['email']; // 用户以 post 方式提交的邮箱
	$password = $_POST['password']; // 用户以 post 方式提交的密码

	// 验证登陆需要先查一查有没有对应用户
	// 如果有对应用户，再查询密码是否匹配
	
	
	$rows = query('SELECT * FROM users WHERE email="' . $email . '"');

   if($rows[0]){ // 有结果，存在邮箱
	  // 再检测密码是否一致
	  if($rows[0]['password'] == $password) {
		
		//通过会话记录下登录的状态
		//这样的话浏览器再次发起请求时
		//可以检测判断这个状态

		//存一个 session  服务器会自动设置一个响应头 
		// Set- Cookie 给浏览器 然后浏览器在本地存一个cookie
		// 这个cookie默认叫 PHPSESSID
		session_start();
		 $_SESSION['user_info'] = $rows[0];

		// / ~~ http://域名或ip/
		header('Location: /admin');
		// 退出程序
		exit;
	  } else { // 不一致
		// 错误提示
		$message = '用户或密码错误!';
	  }
	} else { // 没有结果，不存在邮箱
	  // 错误提示
	  $message = '邮箱不存在!';
	}
  }

?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Sign in &laquo; Admin</title>
  <!-- <link rel="stylesheet" href="../assets/vendors/bootstrap/css/bootstrap.css"> -->
  <?php include './inc/style.php'; ?> 

  <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>
  <div class="login">
	<form action="./login.php" method="post" class="login-wrap">
	  <img class="avatar" src="../assets/img/default.png">
	  <!-- 有错误信息时展示 -->
	  <?php if(!empty($message)) { ?>
	  <div class="alert alert-danger">
		<strong>错误！</strong> <?php echo $message ?>
	  </div>
	  <?php }?>
	  <div class="form-group">
		<label for="email" class="sr-only">邮箱</label>
		<input id="email" type="email" name="email" class="form-control" placeholder="邮箱" autofocus>
	  </div>
	  <div class="form-group">
		<label for="password" class="sr-only">密码</label>
		<input id="password" type="password" name="password" class="form-control" placeholder="密码">
	  </div>
	  <input class="btn btn-primary btn-block" type="submit" value="登 录">
	  <!-- <a class="btn btn-primary btn-block" href="index.html">登 录</a> -->
	</form>
  </div>
</body>
</html>
