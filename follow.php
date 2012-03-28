<?php
include "check.php";
include "dbconnect.php";

$following = $_GET["id"];
$follower = $_SESSION["userid"];

$strSQL = "INSERT INTO Follow(follower, following) values('$follower', '$following')";

$result = mysql_query($strSQL) or die (mysql_error());
	
header("Location: success.php?id=follow");	
?>