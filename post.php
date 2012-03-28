<?php
include "check.php";
include "dbconnect.php";

extract($_POST);

if ($text === '') {
	header("Location: error.php?id=blank");
	exit;
}

$userid = $_SESSION["userid"];
$date = date("d M Y H:i");

$strSQL = "INSERT INTO Messages(userid,text,date) values('$userid', '$text', '$date')";

$result = mysql_query($strSQL) or die (mysql_error());
	
mysql_close();
header("Location: view.php");
exit;
?>