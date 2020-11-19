<?php
/**
-Praktikum DBWT. Autoren:
-Marcel, Buschmann, 3220186
-Michael Buschmann, 3220197
 */

//Datei in Array einlesen
$newsletterDatenArray = file("newsletterDaten.txt");
var_dump($newsletterDatenArray);


?>
<!DOCTYPE html>
<!--
-Praktikum DBWT. Autoren:
-Marcel, Buschmann, 3220186
-Michael Buschmann, 3220197
-->
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Newsletter Daten</title>
</head>

<body>
<p>Hier sind alle gespeicherten Newsletter Anmeldungen: </p>
<pre>
    <?php
    echo "\n";
    readfile("../werbeseite/newsletterDaten.txt"); ?>
</pre>
</body>
