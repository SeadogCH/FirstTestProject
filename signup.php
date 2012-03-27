<?php
extract($_POST);
if ($username === '' || $password === '' || $email === '' ) {
header("Location: error.php?id=blank");
exit;
}

$activationkey = uniqid($more_entropy=true);

include "dbconnect.php";

	$strSQL1 = "SELECT username FROM Users WHERE username='$username'";
	$strSQL2 = "INSERT INTO Users(username, password, email, activationkey) values('$username', '$password', '$email', '$activationkey')";

	$result1 = mysql_query($strSQL1) or die (mysql_error());
	if (mysql_num_rows($result1)>0) {
		header("Location: error.php?id=wrongname");
	}
	else {
		mysql_query($strSQL2) or die (mysql_error());
		
		$to = $email;
		$subject = "Регистрация прошла успешно!";
		$headers  = "From: Юрий Серватко <seadogch@webfck.net>" . "\r\n"; 
		$headers .= "Content-type: text/html; charset=utf-8"; 
		
		$message = "<html><body><p>Поздравляем, $username! Ваш пароль: $password</p><p>Пожалуйста, перейдите по <a href='localhost/test/activate.php?id=$activationkey'>ссылке</a> для активации</p></body></html>";
		mail($to, $subject, $message, $headers);
		header("Location: success.php?id=signup");
	}
	mysql_close();
?>