<!DOCTYPE html>
<!--
-Praktikum DBWT. Autoren:
-Marcel, Buschmann, 3220186
-Michael Buschmann, 3220197
-->
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<h1 style="color: #40BEA9">Übersicht Anmeldungen </h1>
<form  method="post">
    <input type="submit" name="namesort" value="Nach Name sortieren"/>
    <input type="submit" name="mailsort" value="Nach E-Mail sortieren"/>
    <input type="text" name="filter">
    <input type="submit" name="suchen" value="Namen durchsuchen">
</form>


<?php
$ordnung = 0;

if(isset($_POST["namesort"])) {
    $file = 'newsletterDaten.txt';
    $file_handle = fopen($file, 'r');
    for ($i = 0; $i < count(file("newsletterDaten.txt")); $i++) {

        $line = fgets($file_handle);
        list($name, $email,$sprache) = explode(" ", $line,1000);
        $name = strtolower($name);
        $anmeldungen[$i][0] = $name;
        $anmeldungen[$i][1] = $email;
        $anmeldungen[$i][2] = $sprache;
        $anmeldungen[$i][3] = "Datenschutz akzeptiert";
    }
    sort($anmeldungen);
    for ($i = 0; $i < count(file("newsletterDaten.txt")); $i++) {
        $b = $i + 1;
        echo "Anmeldung Nummer ".$b.':'.'<br>'.$anmeldungen[$i][0].'<br>'.$anmeldungen[$i][1].'<br>'.$anmeldungen[$i][2].
            '<br>'.$anmeldungen[$i][3].'<br>'.'<br>';
    }
}

if(isset($_POST["mailsort"])) {
    $file = 'newsletterDaten.txt';
    $file_handle = fopen($file, 'r');
    for ($i = 0; $i < count(file("newsletterDaten.txt")); $i++) {

        $line = fgets($file_handle);
        list($name,$email,$sprache) = explode(" ", $line);
        $name = strtolower($name);
        $anmeldungen[$i][0] = $email;
        $anmeldungen[$i][1] = $name;
        $anmeldungen[$i][2] = $sprache;
        $anmeldungen[$i][3] = "Datenschutz akzeptiert";
    }
    sort($anmeldungen);
    for ($i = 0; $i < count(file("newsletterDaten.txt")); $i++) {
        $b = $i + 1;
        echo "Anmeldung Nummer ".$b.':'.'<br>'.$anmeldungen[$i][0].$anmeldungen[$i][1].'<br>'.$anmeldungen[$i][2].
            '<br>'.$anmeldungen[$i][3].'<br>'.'<br>';
    }
}

if(isset($_POST["suchen"])) {
    $file = 'newsletterDaten.txt';
    $file_handle = fopen($file, 'r');
    for ($i = 0; $i < count(file("newsletterDaten.txt")); $i++) {

        $line = fgets($file_handle);
        list($name, $email, $sprache) = explode(" ", $line);
        $name = strtolower($name);
        $anmeldungen[$i][0] = $name;
        $anmeldungen[$i][1] = $email;
        $anmeldungen[$i][2] = $sprache;
        $anmeldungen[$i][3] = "Datenschutz akzeptiert";
    }

    $vorhanden = false;
    for ($i = 0; $i < count(file("newsletterDaten.txt")); $i++) {

        $text = $anmeldungen[$i][0];
        $search = $_POST["filter"];
        $treffer = stripos($text, $search);
        if($treffer !== false)
        {
            $vorhanden = true;
            echo "Treffer in: ".'<br><br>'.$anmeldungen[$i][0].'<br>'.$anmeldungen[$i][1].'<br>'.$anmeldungen[$i][2].'<br>'.$anmeldungen[$i][3].'<br><br>';
        }


    }

    if($vorhanden == false)
    {
        echo "Keine Treffer";
    }
} ?>

</body>
</html>



