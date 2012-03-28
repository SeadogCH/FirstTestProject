<!doctype html>
<html lang="ru">
<head>
	<title>Ошибка</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/style.css">
</head>
	
<body>
	<div id="wrap">
		<div id="container">
			<header>
				<h1>Ошибка!</h1>
			</header> 
			
			<div id="main">
				<?php
					$id = $_GET["id"];

					if ($id == "wrongpass") {
						echo "<h1>Неправильное имя пользователя или пароль!</h1>";
					}
					elseif ($id == "wrongname") {
						echo "<h1>Такое имя пользователя уже существует!</h1>";
						echo "<h2>Пожалуйста, выберите другой логин.</h2>";
					}
					elseif ($id == "notfound") {
						echo "<h1>Пользователь не найден!</h1>";
					}
					elseif ($id == "noactivation") {
						echo "<h1>Учетная запись не активирована!</h1>";
					}
					elseif ($id == "activation") {
						echo "<h1>Ошибка активации!</h1>";
					}
					elseif ($id == "blank") {
						echo "<h1>Пустые поля!</h1>";
					}
					elseif ($id == "wrongrepass") {
						echo "<h1>Пароли не совпадают!</h1>";
					}
					else {
						echo "<h1>Неизвестная ошибка!</h1>";
					}
				?>
				<p><a href="index.php">Назад</a></p>
			</div>
			
			<footer>
				<p>&nbsp;Все права защищены (c) 2012</p>
			</footer>
		</div>
	</div>
</body>
</html>