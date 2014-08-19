<?php
$user = "root";
$pass = "";
$db = "forum";
$host = "localhost";
$conn = mysql_connect($host, $user, $pass) or die("Connection to database failed, we're working on the problem, please try again later.");
$db = mysql_select_db($db,$conn) or die("Connection to database failed, we're working on the problem, please try again later.");
?>
