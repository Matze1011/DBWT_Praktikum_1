<?php
/**
-Praktikum DBWT. Autoren:
-Marcel, Buschmann, 3220186
-Michael Buschmann, 3220197
 */

//Um den verwendeten Browser aus User Agent raus zu angeln.
$arr_browsers = ["Opera", "Edg", "Chrome", "Safari", "Firefox", "MSIE", "Trident"];

$agent = $_SERVER['HTTP_USER_AGENT'];

$user_browser = '';
foreach ($arr_browsers as $browser) {
    if (strpos($agent, $browser) !== false) {
        $user_browser = $browser;
        break;
    }
}

switch ($user_browser) {
    case 'MSIE':
        $user_browser = 'Internet Explorer';
        break;

    case 'Trident':
        $user_browser = 'Internet Explorer';
        break;

    case 'Edg':
        $user_browser = 'Microsoft Edge';
        break;
}


$leerzeichen = "\t";
$neueZeile= "\n"; //PHP_EOL
    $server = "IP Adresse: ".$_SERVER['REMOTE_ADDR'];
    $datum = date(DATE_RFC2822);
    echo $_SERVER['SERVER_ADDR'];
    $file = fopen('./accesslog.txt','a');
    fwrite ($file,$server); fwrite($file,$leerzeichen);
    fwrite($file,$datum); fwrite($file,$leerzeichen);
    fwrite($file,$user_browser);
    fwrite ($file,$neueZeile);
    fclose($file);
    echo date(DATE_RFC2822);

    echo $user_browser;

?>