<?php

session_start();
define('SITEURL','http://localhost/project/');
define('LOCALHOST','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','556624');
define('DB_NAME','project');
$conn= mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die (mqsqli_error());

$db_select= mysqli_select_db($conn,'project') or die(mqsli_error());

?>