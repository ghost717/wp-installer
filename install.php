<?php 
$break = "\n\n";
$open = "  ";

include 'sql.php';

$url = "https://wordpress.org/latest.zip";
$zipFile = "wp.zip";

echo $break;
echo $open . 'Pobieram ostatnią wersje wordpressa z ' . $url . $break;

echo $break;
echo $open . ":: Randomowy Kawał :D ::" . $break;
echo $open. ":: " . str_replace('"', '', file_get_contents('https://geek-jokes.sameerkumar.website/api'));
echo $break;

/* DOWNLOAD FILE */
$zipResource = fopen($zipFile, "w");
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FAILONERROR, true);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_AUTOREFERER, true);
curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 100);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_FILE, $zipResource);
$downloaded = curl_exec($ch);
if (!$downloaded) {
    echo $open . "<p class='error'>Błąd pobierania - log: ".curl_error($ch) . '</p>';
}
curl_close($ch);


/* UNZIP */
$file = 'wp.zip';
$path = pathinfo(realpath($file), PATHINFO_DIRNAME);
$zip = new ZipArchive;
$res = $zip->open($file);
if ($res === true) {
	echo $open . 'Rozpakowuje ' . $file . $break;

    $zip->extractTo($path);
    $zip->close();
} else {
	echo $open . "Nie można było rozpakować archiwum" . $break;
	echo $open . "Musisz dokończyć proces ręcznie" . $break;
	exit;
}
echo $open . "-Kończenie instalacji-" . $break;

/* CLEANING */
echo $open . "Usuwam oryginalnego wp-content" . $break;
exec('rmdir /Q /S '.getcwd().'\wordpress\wp-content');
echo $open . "Usuwam pliki instalacyjne" . $break;
exec('del install.php');
exec('del install-mac.php');
echo $open . "Usuwam .gitignore" . $break;
exec('del .gitignore');
echo $open . "Usuwam README.md" . $break;
exec('del README.md');
echo $open . "Kopiuje pliki szablonów oraz motywu" . $break;
exec('robocopy /move /e wordpress ' . getcwd());
echo $open . "Usuwam repozytorium" . $break;
exec('rmdir /Q /S .git');

echo $open . "Usuwam license.txt i readme.html" . $break;
exec('del license.txt');
exec('del readme.html');


/* DATABASE */
echo $open . "Pobieram db.sql" . $break;

//export db
$command = $mysqldump_path .' -u '.$mysql_username.' -h '.$mysql_host.' '.$db_to_export.' > '.$project_path.'/'.$filename;
exec($command, $output, $return_var);

//changing project path
$myfile = file_get_contents('./'.$filename);
$projectPath = dirname(__FILE__);

//echo $myfile;
$newProjectPath = str_replace("\\", "/", $projectPath);
$myfile = str_replace("C:/serwer/htdocs/praca/wp-314", $newProjectPath, $myfile);
$newProjectPath = str_replace("C:/serwer/htdocs", "http://localhost", $newProjectPath);


$newFile = str_replace("http://localhost/praca/wp-314", $newProjectPath, $myfile);

file_put_contents("./".$filename,$newFile);
//file_put_contents("./dump.sql",$newFile);

//import db
echo $open . "Importuje db.sql" . $break;

$con = mysqli_connect($mysql_host,$mysql_username,$mysql_password,$db_to_import);

	if (!$con) {
		die('Could not connect: ' . mysqli_error());
	}
	// echo 'Connected successfully';

	// Temporary variable, used to store current query
	$templine = '';
	// Read in entire file
	$lines = file($filename);
	// Loop through each line
	foreach ($lines as $line){
	// Skip it if it's a comment
		if (substr($line, 0, 2) == '--' || $line == '')
			continue;

		// Add this line to the current segment
		$templine .= $line;
	// If it has a semicolon at the end, it's the end of the query
		if (substr(trim($line), -1, 1) == ';'){
			// Perform the query
			mysqli_query($con, $templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysqli_error() . '<br /><br />');
			// Reset temp variable to empty
			$templine = '';
		}
	}

	echo "Tables imported successfully" . $break;

mysqli_close($con);

echo $open . "Usuwam sql.php i ".$filename.' ' . $break;
exec('del '.$filename);
exec('del sql.php');


echo $break;
echo $open . "-Operacja zakończona!-";
echo $break;
echo $open . "@@Usuń plik wp.zip (problem z prawami procesu)@@". $break;

?>