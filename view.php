<?php
include "check.php";
include "dbconnect.php";

$email = $_SESSION["email"];
$grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) );
?>
<!doctype html>
<html lang="ru">
<head>
	<script type="text/javascript">
	function confirm_delete(id) {
		var answer = confirm("Вы уверены, что хотите удалить запись?");
		if (answer == true) {
			window.location = 'delete.php?id='+id;
		}
	 }
	</script>
	<title>Моя страница</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<div id="wrap">
		<div id="container">
	 		<header>
	 			<?php
				echo "<h1>Привет, {$_SESSION['login']}!</h1>";
				?>
			</header> 
			
			<div id="main">	
				<div id="left">
					<img src="<?php echo $grav_url; ?>" />
					<p><a href="profileView.php">Мой профиль</a></p>
					<p style="margin-bottom: 19px;"><a href="logout.php">Выход</a></p>
					<form method="post" action="post.php">
					<p style="margin-bottom: 22px;"><textarea style="resize: none;" class="input" name="text" placeholder="Введите текст сообщения"></textarea></p>
					<p><input type="submit" value="Ввод" /></p>
					</form>
					<?php
					echo "<p>Тестируем сессию:</p>";
					echo "<p>{$_SESSION['userid']}</p>";
					echo "<p>{$_SESSION['login']}</p>";
					echo "<p>{$_SESSION['email']}</p>";
					echo "<p>Тестируем куки:</p>";
					echo "<p>{$_COOKIE['cookie_userid']}</p>";
					echo "<p>{$_COOKIE['cookie_login']}</p>";
					echo "<p>{$_COOKIE['cookie_email']}</p>";
					
					$userid = $_SESSION["userid"];
					$login = $_SESSION["login"];

					$strSQL1 = "SELECT following FROM Follow WHERE follower = '$userid'";
					
					$result1 = mysql_query($strSQL1) or die (mysql_error());
	
					while($row = mysql_fetch_array($result1)) {
						extract($row);
						$array[] = $following;
					}
					
					$array[] = $userid;
					$matches = implode(',', $array);
	
					$strSQL2 = "SELECT Users.`username`, Messages.`text`, Messages.`date`, Messages.`userid`, Messages.`id`
							FROM Users, Messages  
							WHERE Users.`id` = Messages.`userid` AND Users.`id` IN ( $matches ) ORDER BY Messages.`date` DESC";
							
					$result2 = mysql_query($strSQL2) or die (mysql_error());

					while($row = mysql_fetch_array($result2)) {
						extract($row);
						if ($userid == $_SESSION["userid"]) {
							echo "<p><a href = '#'><img src='img/delete.png' style='vertical-align: text-bottom' onclick='confirm_delete($id);'/></a> $date <a href='userView.php?id=$userid'>$username</a> написал: <strong>$text</strong></p>";	
						}
						else {
							echo "<p>$date <a href='userView.php?id=$userid'>$username</a> написал: <strong>$text</strong></p>";
						}	
					}
					?>
					<a href="rss.php"><img src="img/rss.png"/></a>
				</div>
				<div id="right">
					<h2 style="margin-bottom: 21px;">Поиск:</h2>
					<form method="post" action="search.php">
					<p style="margin-bottom: 21px;"><input class="input" type="text" name="username" placeholder="Имя пользователя"/></p>
					<p><input type="submit" value="Поиск"/></p>
					</form>
					<?php  
					$userid = $_SESSION["userid"];
					
					$strSQL3 = "SELECT Users.`username`, Follow.`following`
					FROM Users, Follow  
					WHERE Users.`id` = Follow.`following` AND Follow.`follower` = '$userid'";
							
					$result3 = mysql_query($strSQL3) or die (mysql_error());
					
					if (mysql_num_rows($result3)>0) {
						echo"<h2>Вы подписаны на:</h2>";
						while($row = mysql_fetch_array($result3)) {
							extract($row);
							echo "<p><a href='userView.php?id=$following'>$username</a></p>";
						}
					}
			
					$userid = $_SESSION["userid"];	
					
					$strSQL4 = "SELECT Users.`username`, Follow.`follower`
					FROM Users, Follow  
					WHERE Users.`id` = Follow.`follower` AND Follow.`following` = '$userid'";
							
					$result4 = mysql_query($strSQL4) or die (mysql_error());
					
					if (mysql_num_rows($result4)>0)	{
						echo"<h2>Ваши подписчики:</h2>";
						while($row = mysql_fetch_array($result4)) {
							extract($row);
							echo "<p><a href='userView.php?id=$follower'>$username</a></p>";
						}	
					}
					mysql_close(); 
					?>
				</div>
			</div>
			
  			<footer>
				<p>&nbsp;Все права защищены (c) 2012</p>
  			</footer>
		</div>
	</div>
</body>
</html>