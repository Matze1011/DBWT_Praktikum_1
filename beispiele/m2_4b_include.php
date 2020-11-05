<?php
/**
-Praktikum DBWT. Autoren:
-Marcel, Buschmann, 3220186
-Michael Buschmann, 3220197
 */

include ('m2_4a_standardparameter.php');
//Variablen erstellen
$summand1 = 3;
$summand2 = 5;
$summand3 = 0;
$summand4 = 10;

//Funktion mehrmals anwenden und Ergebnis ausgeben
echo "Ergebnis der ersten Addition 3 + 5 = "; echo addieren($summand1,$summand2); echo "<br>";
echo "Ergebnis der zeiten Addition 1 +(standardparameter 0) = "; echo addieren($summand1); echo "<br>";
echo "Ergebnis der dritten Addition 0 + 10 = ";echo addieren($summand3,$summand4); echo "<br>";