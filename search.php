<?php
include "check.php";
include "dbconnect.php";

extract($_POST);

if ($username === '') {
	header("Location: error.php?id=blank");
	exit;
}

$strSQL = "SELECT id FROM Users WHERE username LIKE '$username%'";

$result = mysql_query($strSQL) or die (mysql_error());
	
if (mysql_num_rows($result)==1) {
	while($row = mysql_fetch_array($result)) {
		extract($row);
		header("Location:userView.php?id=$id");
	}
}
elseif (mysql_num_rows($result)>1) {
	header("Location: searchView.php?id=$username");
	exit;
}
else {
	header("Location: error.php?id=notfound");
exit;	
}
?>