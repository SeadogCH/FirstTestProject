<?php
include "check.php";
include "dbconnect.php";

$userid = $_SESSION["userid"];

$strSQL = "SELECT * FROM Users WHERE id = '$userid'";

$result = mysql_query($strSQL) or die (mysql_error());

while($row = mysql_fetch_array($result)) {
		extract($row);
}
	
mysql_close();
?>
<!doctype html>
<html lang="ru">
<head>
	<title>Мой профиль</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<div id="wrap">
		<div id="container">
	 		<header>
				<?php
				echo "<h1>Профиль пользователя {$_SESSION['login']}</h1>";
				?>
			</header> 

			<div id="main">	
				<form method='post' action='updateProfile.php'>
				<p style="margin-bottom: 21px;"><input class="input" type='text' name='username' value="<?php echo $username ?>"/></p>
				<p style="margin-bottom: 21px;"><input class="input" type='email' name='email' value="<?php echo $email ?>"/></p>
				<p style="margin-bottom: 21px;"><input class="input" type='password' name='password' placeholder="Новый пароль"/></p>
				<p style="margin-bottom: 21px;"><input class="input" type='password' name='repassword' placeholder="Новый пароль еще раз"/></p>
				<p><a href="index.php">Назад</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="submit" value="Ввод" /></p>
				</form>
			</div>
	  		
	  		<footer>
				<p>&nbsp;Все права защищены (c) 2012</p>
	  		</footer>
	  	</div>
	</div>
</body>
</html>