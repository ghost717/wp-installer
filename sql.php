<?php

$stdin = fopen('php://stdin', 'r');

$return_var = NULL;
$output = NULL;

// DATABASE
echo 'sql to import '.$break;
$filename = trim(fgets($stdin));

echo 'db_to_export '.$break;
$db_to_export = trim(fgets($stdin));

echo 'db_to_import '.$break;
$db_to_import = trim(fgets($stdin));

// MySQL host
$mysql_host = '127.0.0.1'; //localhost

echo 'mysql_username '.$break;
$mysql_username = trim(fgets($stdin));

echo 'mysql_password '.$break;
$mysql_password = trim(fgets($stdin));

//windows MySQL path
$project_path = dirname(__FILE__);
$mysqldump_path = realpath('/serwer/mysql/bin/mysqldump.exe'); 

?>