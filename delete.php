<?php
include "check.php";
include "dbconnect.php";

$messageid = $_GET["id"];

$strSQL = "DELETE FROM Messages WHERE id='$messageid'"; 

$result = mysql_query($strSQL) or die (mysql_error());
	
header("Location: view.php");	
?>