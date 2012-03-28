<?php 
session_start();

if (isset($_COOKIE["cookie_login"])) {
$_SESSION["login"] = $_COOKIE["cookie_login"];
$_SESSION["userid"] = $_COOKIE["cookie_userid"];
$_SESSION["email"] = $_COOKIE["cookie_email"];
}

if (isset($_SESSION["userid"]) == FALSE)
{
header("Location: index.php");
exit;
}
?>