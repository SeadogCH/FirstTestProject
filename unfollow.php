<?php
include "check.php";
$following = $_GET["id"];
$follower = $_SESSION["userid"];

include "dbconnect.php";

	$strSQL = "DELETE FROM Follow WHERE follower='$follower' AND following ='$following'"; 
	$result = mysql_query($strSQL) or die (mysql_error());
	
	header("Location: success.php?id=unfollow");	
?>