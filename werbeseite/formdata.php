<?php
/**
-Praktikum DBWT. Autoren:
-Marcel, Buschmann, 3220186
-Michael Buschmann, 3220197
 */
$trashmails = array('rcpt.at','damnthespam', 'wegwerfmail.de','trashmail.');

$name = $_POST['benutzer'] ?? null;
$email =  $_POST['mail'] ?? null;
$userDatenschutz = $_POST['datenschutz'] ?? null;
$userSprache = $_POST['sprache'];

if (ctype_space($name)){
    $fehler = 'Der Name muss eingegeben werden und darf nicht leer sein';
    echo $fehler;
}

else if(!isset($_POST['mail'])){
    $fehler = 'Es muss ein Email Adresse eingegeben werden';
    echo $fehler;
}
else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo $fehler ='Ihre E-Mail Adresse entpsricht nicht den Vorgaben';
}

else if(preg_match_all("/(wegwerfmail.de|damnthespam|rcpt.at|trashmail.)/", $email)){
   echo $fehler = 'Mails von dieser Domain sind geblockt!';
}

else if(!isset($_POST['datenschutz'])){
    $fehler = 'Bitten Datenschutzbestimmungen zustimmen';
    echo $fehler;
}

//Daten verarbeiten
else {
    $neueZeile= "\n";
    $komma = ",";
    include("newsletterCounter.php"); //Newsletter Zähler ums eins inkrementieren


    //unsortierte Daten lesbar speichern
    $file = fopen('newsletterDaten.txt','a');
    fwrite($file,$name); fwrite($file,$neueZeile);
    fwrite($file,$email); fwrite($file,$neueZeile);
    fwrite($file,$userSprache); fwrite($file,$neueZeile);
    fwrite($file,$userDatenschutz);fwrite($file,$neueZeile);

    //sortierte Daten mit Namen beginnend
    $file = fopen("sortierte_Daten.txt","a+");
    fwrite($file,$name);fwrite($file,$komma);
    fwrite($file,$email);fwrite($file,$komma);
    fwrite($file,$userSprache);fwrite($file,$komma);
    fwrite($file,$userDatenschutz);fwrite($file,$neueZeile);

    //sortierte Daten mit E-mail Adresse beginnend
    $file = fopen("sortierte_Daten_fuer_mail.txt","a+");
    fwrite($file,$email);fwrite($file,$komma);
    fwrite($file,$name);fwrite($file,$komma);
    fwrite($file,$userSprache);fwrite($file,$komma);
    fwrite($file,$userDatenschutz);fwrite($file,$neueZeile);

    echo '<script>alert("Ihre Daten wurde erfolgreich gespeichert!")</script>';
}


?>

<script type="text/javascript">
    window.location = "werbeseite.php";
</script>



