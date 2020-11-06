<?php
/**
-Praktikum DBWT. Autoren:
-Marcel, Buschmann, 3220186
-Michael Buschmann, 3220197
 */
$trashmails = array('rcpt.at','damnthespam', 'wegwerfmail.de','trashmail.');

$userName = $_POST['benutzer'] ?? null;
$userMail =  $_POST['mail'] ?? null;
$userDatenschutz = $_POST['datenschutz'] ?? null;

if (ctype_space($userName)){
    $fehler = 'Der Name muss eingegeben werden und darf nicht leer sein';
    echo $fehler;
}

else if(!isset($_POST['mail'])){
    $fehler = 'Es muss ein Email Adresse eingegeben werden';
    echo $fehler;
}
else if(!filter_var($userMail, FILTER_VALIDATE_EMAIL)){
    echo $fehler ='Ihre E-Mail Adresse entpsricht nicht den Vorgaben';
}

else if(preg_match_all("/(wegwerfmail.de|damnthespam|rcpt.at|trashmail.)/", $userMail)){
   echo $fehler = 'Mails von dieser Domain sind geblockt!';
}

else if(!isset($_POST['datenschutz'])){
    $fehler = 'Bitten Datenschutzbestimmungen zustimmen';
    echo $fehler;
}
else {
    $neueZeile= "\n";
    $file = fopen('newsletterDaten.txt','a');

    fwrite($file,'Benutzer Name: ');fwrite($file,$userName); fwrite($file,$neueZeile);
    fwrite($file,'Benutzer Mail: ');fwrite($file,$userMail); fwrite($file,$neueZeile);
    fwrite($file,'Datenschutz: ') ;fwrite($file,$userDatenschutz); fwrite($file,$neueZeile); fwrite($file,$neueZeile);

    echo 'Daten erfolgreich gespeichert';

}
/**
sleep(5);
    if (isset($_SERVER["HTTP_REFERER"])){
    header("Location: ". $_SERVER["HTTP_REFERER"]);
    }

?>
 */


