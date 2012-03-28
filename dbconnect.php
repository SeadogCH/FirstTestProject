<?php
$server_url = "http://localhost:8888/test";
$dbhost = "localhost";
$dbusername ="root";
$dbpassword = "arvestokora";
$dbname = "test";
mysql_connect("$dbhost", "$dbusername", "$dbpassword") or die (mysql_error ());
mysql_select_db("$dbname") or die(mysql_error());
?>