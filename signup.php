<?php
include "dbconnect.php";

extract($_POST);

if ($username === '' || $password === '' || $repassword === '' || $email === '' ) {
header("Location: error.php?id=blank");
exit;
}

if ($password != $repassword) {
header("Location: error.php?id=wrongrepass");
exit;
}

$encrypted_password = md5($password);
$activationkey = uniqid($more_entropy=true);

$strSQL1 = "SELECT username FROM Users WHERE username='$username'";
$strSQL2 = "INSERT INTO Users(username, password, email, activationkey) values('$username', '$encrypted_password', '$email', '$activationkey')";

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
		
	$message = "<html><body><p>Поздравляем, $username! Ваш пароль: $password</p><p>Пожалуйста, перейдите по <a href='$server_url/activate.php?id=$activationkey'>ссылке</a> для активации</p></body></html>";
	mail($to, $subject, $message, $headers);
	header("Location: success.php?id=signup");
}

mysql_close();
?>