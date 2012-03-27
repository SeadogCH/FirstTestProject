<?php
include "check.php";
extract($_POST);
if ($username === '' || $password === '' || $email === '' ) {
header("Location: error.php?id=blank");
exit;
}
$login = $_SESSION["login"];	

include "dbconnect.php";

		$strSQL1 = "SELECT username FROM Users WHERE username='$username'";	
		$result1 = mysql_query($strSQL1) or die (mysql_error());
		
		$strSQL2 = "UPDATE Users
		           SET username = '$username', password = '$password', email = '$email'
		           WHERE username='$login'";
		
		if (mysql_num_rows($result1)>0 && $username != $login) {
			header("Location: error.php?id=wrongname");
		}
		else {
			mysql_query($strSQL2) or die (mysql_error());
			$_SESSION["login"]="$username";
			header("Location: success.php?id=update");
		}
		mysql_close();
?>