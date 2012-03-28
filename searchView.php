<!doctype html>
<html lang="ru">
<head>
	<title>Поиск</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<div id="wrap">
		<div id="container">
	 		<header>
	 			<h1>Результаты поиска</h1>
			</header> 

			<div id="main">
				<?php
				include "check.php";
				include "dbconnect.php";
				
				$id = $_GET["id"];
				
				$strSQL = "SELECT id, username FROM Users WHERE username LIKE '$id%'";
				
				$result = mysql_query($strSQL) or die (mysql_error());
				
				while($row = mysql_fetch_array($result)) {
				extract($row);
				echo "<p><a href='userView.php?id=$id'>$username</a></p>";
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