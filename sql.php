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
echo 'sql to import '.$break;
$filename = trim(fgets($stdin));
$filename = $filename.'.sql';

echo 'db_to_export '.$break;
$db_to_export = trim(fgets($stdin));

echo 'db_to_import '.$break;
$db_to_import = trim(fgets($stdin));


// //changing project path
// $myfile = file_get_contents('./'.$filename);
// $projectPath = dirname(__FILE__);

// //echo $myfile;
// $newProjectPath = str_replace("\\", "/", $projectPath);
// $newProjectPath = str_replace("C:/serwer/htdocs", "http://localhost", $newProjectPath);

// $newProjectPath = str_replace("C:/serwer/htdocs", "http://localhost", $newProjectPath);

// $newFile = str_replace("http://localhost/praca/wp-314/", $newProjectPath.'/', $myfile);

// file_put_contents("./".$filename,$newFile);



//windows MySQL path
$project_path = dirname(__FILE__);
$mysqldump_path = realpath('/serwer/mysql/bin/mysqldump.exe'); 





?>