<?php

$stdin = fopen('php://stdin', 'r');

$return_var = NULL;
$output = NULL;

// MySQL host
echo 'mysql_host '.$break; //$mysql_host = '127.0.0.1'; //localhost
$mysql_host = trim(fgets($stdin));

echo 'mysql_username '.$break;
$mysql_username = trim(fgets($stdin));

echo 'mysql_password '.$break;
$mysql_password = trim(fgets($stdin));

// DATABASE
echo 'name of file to import '.$break;
$filename = trim(fgets($stdin));
$filename = $filename.'.sql';

echo 'database to export '.$break;
$db_to_export = trim(fgets($stdin));

echo 'database to import '.$break;
$db_to_import = trim(fgets($stdin));

//windows MySQL path
$project_path = dirname(__FILE__);
$mysqldump_path = realpath('/serwer/mysql/bin/mysqldump.exe'); 

?>