<?php
include "check.php";
$following = $_GET["id"];
$follower = $_SESSION["userid"];

include "dbconnect.php";

	$strSQL = "INSERT INTO Follow(follower, following) values('$follower', '$following')";
	$result1 = mysql_query($strSQL) or die (mysql_error());
	
	header("Location: success.php?id=follow");	
?>