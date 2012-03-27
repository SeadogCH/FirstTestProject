<?php
session_start();
if (isset($_COOKIE["cookie_login"]) || isset($_SESSION["userid"])) {
header("Location: view.php");
} 
?>
<!doctype html>
	<html lang="ru">
	<head>
	<title>Тестовое задание</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
	 <div id="wrap">
	  <div id="container">
	  <header>
		<h1>Тестовое задание</h1>
	  </header> 
	 <div id="main">	
	<form method="post" action="login.php">
		<p><input class="input" type="text" name="username" placeholder="Имя пользователя"/></p>
		<p><input style="margin-top: 7px; margin-bottom: 7px;" class="input" type="password" name="password" placeholder="Пароль"/></p>
		<p><input type="checkbox" name="rememberme" value="YES" checked> Запомнить меня &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input style="margin-bottom: 8px;" type="submit" value="Вход" /></p>
	</form>
	<p><a href="signupView.php">Регистрация</a></p>
	</div>
	  <footer>
		<p>&nbsp;Все права защищены (c) 2012</p>
	  </footer>
	  </div>
	  </div>
	</body>
	</html>