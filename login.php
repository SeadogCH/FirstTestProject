<?php
extract($_POST);
	
include "dbconnect.php";

$strSQL = "SELECT * FROM Users WHERE username='$username' AND password='$password'";
$result = mysql_query($strSQL) or die (mysql_error());
while($row = mysql_fetch_array($result)) {
	extract($row);
}
		
if (empty($activationkey) == FALSE) {
	header("Location: error.php?id=noactivation");
	}
elseif (mysql_num_rows($result)==1) {
		if (isset($rememberme)) {
			setcookie("cookie_login", "$username", time()+60*60*24);
			setcookie("cookie_userid", "$id", time()+60*60*24);
		}
		session_start();
		$_SESSION["email"] = "$email";
		$_SESSION["userid"] = "$id";
		$_SESSION["login"] = "$username";
		header("Location: view.php");
		exit;
}
else {
		header("Location: error.php?id=wrongpass");		 
	}
	mysql_close();
?>