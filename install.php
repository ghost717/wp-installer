<?php 
$break = "\n\n";
$open = "  ";

$url = "https://wordpress.org/latest.zip";
$zipFile = "wp.zip";

echo $break;
echo $open . 'Pobieram ostatnią wersje wordpressa z ' . $url . $break;

echo $break;
echo $open . ":: Randomowy Kawał :D ::" . $break;
echo $open. ":: " . str_replace('"', '', file_get_contents('https://geek-jokes.sameerkumar.website/api'));
echo $break;


//pobieranie ostatniego wp
$zipResource = fopen($zipFile, "w");
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FAILONERROR, true);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_AUTOREFERER, true);
curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_FILE, $zipResource);
$downloaded = curl_exec($ch);
if (!$downloaded) {
    echo $open . "<p class='error'>Błąd pobierania - log: ".curl_error($ch) . '</p>';
}
curl_close($ch);
// plik pobrany


//unzip
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

echo $open . "Usuwam oryginalnego wp-content" . $break;
exec('rmdir /Q /S '.getcwd().'\wordpress\wp-content');

echo $open . "Usuwam pliki instalacyjne" . $break;
exec('del install.php');
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

echo $break;
echo $open . "-Operacja zakończona!-";
echo $break;
echo $open . "@@Usuń plik wp.zip (problem z prawami procesu)@@". $break;
?>