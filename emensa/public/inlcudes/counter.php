<?php

/**
-Praktikum DBWT. Autoren:
-Marcel, Buschmann, 3220186
-Michael Buschmann, 3220197
 */

// Dateiname zum Abspeichern des Zählers
$datei="../storage/daten/counter.txt";

if(file_exists($datei)){
    // Falls die Datei existiert, wird sie ausgelesen und
    // der dort enthaltene Wert um Eins erhöht.
    $fp = fopen($datei,"r+");
    $zahl = file_get_contents("../storage/daten/counter.txt");
    $zahl++;
    fwrite($fp,$zahl);
    fclose($fp);
}else{
    // Die Datei counter.txt existiert nicht, sie wird
    // neu angelegt und mit dem Wert 1 gefüllt.
    $fp = fopen($datei,"w");
    $zahl = 1;
    fwrite($fp,$zahl);
    fclose($fp);
}

$fp = fopen($datei,"r+");
$zahl = file_get_contents("../storage/daten/counter.txt");


?>
