<?php
if (isset($_COOKIE["cookie_login"])) {
	setcookie("cookie_login", "", time()-3600);
	setcookie("cookie_userid", "", time()-3600);
	setcookie("cookie_email", "", time()-3600);
}
session_start(); 
session_destroy(); 
header("Location: index.php");
exit;
?>