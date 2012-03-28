<?php
include "check.php";
include "dbconnect.php";

$viewid = $_GET["id"];
$login = $_SESSION["userid"];

$strSQL1 = "SELECT email, username FROM Users WHERE id = '$viewid'";

$result1 = mysql_query($strSQL1) or die (mysql_error());

while($row = mysql_fetch_array($result1)) {
		extract($row);
	}
	
$grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) );
?>
<!doctype html>
<html lang="ru">
<head>
	<title>Страница пользователя</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<div id="wrap">
 		<div id="container">
 			<header>
				 <?php  
				 echo "<h1>Страница пользователя $username</h1>";
				 ?>
 			</header> 
 
 			<div id="main">
 				<div id="left">
	 				<img src="<?php echo $grav_url; ?>" />
					<?php  		
					$strSQL2 = "SELECT * FROM Messages WHERE userid = '$viewid'";
					
					$result2 = mysql_query($strSQL2) or die (mysql_error());
					
					if (mysql_num_rows($result2)==0) {
						echo "<h2>Нет сообщений</h2>";	
					}	
					else {
						while($row = mysql_fetch_array($result2)) {
							extract($row);
							echo "<p>$date $username написал: <strong>$text</strong></p>";
						}
					}	
					
					if ($login != $viewid) {
						$strSQL3 = "SELECT * FROM Follow WHERE follower='$login' AND following='$viewid'";
						
						$result3 = mysql_query($strSQL3) or die (mysql_error());
						
						if (mysql_num_rows($result3)>0) {
							echo "<p><a href='unfollow.php?id=$viewid'>Отписаться</a></p>";	
						}	
						else {
							echo "<p><a href='follow.php?id=$viewid'>Подписаться</a></p>";
						}	
					}
					
					?>
					<p><a href='view.php'>Назад</a></p>
				</div>
				<div id="rigth">
					<?php 	
					$strSQL4 = "SELECT Users.`username`, Follow.`following`
					FROM Users, Follow  
					WHERE Users.`id` = Follow.`following` AND Follow.`follower` = '$viewid'";
						
					$result4 = mysql_query($strSQL4) or die (mysql_error());
					
					if (mysql_num_rows($result4)>0) {
						echo"<h2>Подписан на:</h2>";
						while($row = mysql_fetch_array($result4)) {
							extract($row);
							echo "<p><a href='userView.php?id=$following'>$username</a></p>";
						}
					}
							
					$strSQL5 = "SELECT Users.`username`, Follow.`follower`
					FROM Users, Follow  
					WHERE Users.`id` = Follow.`follower` AND Follow.`following` = '$viewid'";
									
					$result5 = mysql_query($strSQL5) or die (mysql_error());
					
					if (mysql_num_rows($result5)>0)	{
						echo"<h2>Подписчики:</h2>";
						while($row = mysql_fetch_array($result5)) {
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