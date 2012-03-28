<?php
include "check.php";
include "dbconnect.php";

extract($_POST);

$userid = $_SESSION["userid"];
$login = $_SESSION["login"];	

$strSQL1 = "SELECT username FROM Users WHERE username='$username'";	

$result1 = mysql_query($strSQL1) or die (mysql_error());

if (mysql_num_rows($result1)>0 && $username != $login) {
	header("Location: error.php?id=wrongname");
	exit;
}

if ($username === '' || $email === '' ) {
	header("Location: error.php?id=blank");
	exit;
}
elseif ($password != $repassword) {
	header("Location: error.php?id=wrongrepass");
	exit;
}
elseif ($password === '' && $repassword === '') {
	$strSQL2 = "UPDATE Users
        	   SET username = '$username', email = '$email'
        	   WHERE id='$userid'";

	mysql_query($strSQL2) or die (mysql_error());
	
	if (isset($_COOKIE["cookie_login"])) {
		setcookie("cookie_login", "$username", time()+60*60*24);
		setcookie("cookie_email", "$email", time()+60*60*24);
    }
    $_SESSION["login"]="$username";
    $_SESSION["email"] = "$email";
    header("Location: success.php?id=update");
    exit;
}
else {
	$encrypted_password = md5($password);

	$strSQL3 = "UPDATE Users
    	       SET username = '$username', password = '$encrypted_password', email = '$email'
        	   WHERE id='$userid'";
	mysql_query($strSQL3) or die (mysql_error());
	
	if (isset($_COOKIE["cookie_login"])) {
		setcookie("cookie_login", "$username", time()+60*60*24);
		setcookie("cookie_email", "$email", time()+60*60*24);
	}
	$_SESSION["login"]="$username";
	$_SESSION["email"] = "$email";
	header("Location: success.php?id=update");
	exit;
}
mysql_close();
?>