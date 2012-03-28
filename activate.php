<?php
include "dbconnect.php";

$activationkey = $_GET["id"];

$strSQL1 = "SELECT * FROM Users WHERE activationkey='$activationkey'";

$result1 = mysql_query($strSQL1) or die (mysql_error());

if (mysql_num_rows($result1)==1) {
	$strSQL2 = "UPDATE Users
	           SET activationkey = NULL
	           WHERE activationkey='$activationkey'";
	$result2 = mysql_query($strSQL2) or die (mysql_error());
	header("Location: success.php?id=activation");
}
else {
	header("Location: error.php?id=activation");
}
?>