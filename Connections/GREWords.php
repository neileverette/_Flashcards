<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_GREWords = "127.0.0.1";
$database_GREWords = "grewords";
$username_GREWords = "root";
$password_GREWords = "n5464e";
$GREWords = mysql_pconnect($hostname_GREWords, $username_GREWords, $password_GREWords) or trigger_error(mysql_error(),E_USER_ERROR); 
?>