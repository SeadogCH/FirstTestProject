<!doctype html>
<html lang="ru">
<head>
	<title>Успех</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/style.css">
</head>
	
<body>
	<div id="wrap">
		<div id="container">
	 		<header>
	 			<h1>Успех!</h1>
	 		</header> 
	
			<div id="main">
				<?php
				$id = $_GET["id"];
				
				if ($id == "signup") {
					echo "<h1>Регистрация прошла успешно!</h1>";
					echo "<h2>Проверьте почту для активации учетной записи.</h2>";
				}
				elseif ($id == "update") {
					echo "<h1>Обновление профиля прошло успешно!</h1>";
				}
				elseif ($id == "follow") {
					echo "<h1>Подписка прошла успешно!</h1>";
				}
				elseif ($id == "unfollow") {
					echo "<h1>Отписка прошла успешно!</h1>";
				}
				elseif ($id == "activation") {
					echo "<h1>Учетная запись успешно активирована!</h1>";
				}
				else {
					header("Location: error.php");
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