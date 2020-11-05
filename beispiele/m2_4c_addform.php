<?php
/**
-Praktikum DBWT. Autoren:
-Marcel, Buschmann, 3220186
-Michael Buschmann, 3220197
 */
 // Formular, dass dem Benutzer 2 Eingabefelder gibt mit einer Schaltfläche addieren.
include ('m2_4a_standardparameter.php');

function multiplizieren($a,$b){
    echo $a * $b;
}
 ?>

<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>2 Zahlen addieren</title>
</head>
<body>
<h3>Formular um 2 Zahlen zu addieren</h3>

<label for = "Addition"><h4>Addition zweier Zahlen</h4></label>
<form method="get" name="Addition" >
    <label for = "ersterSummand">Erster Summand</label> <input type = "text"  name="ersterSummand"> <br> <br>
    <label for = "zweiterSummand">Zweiter Summand</label> <input type = "text" name = "zweiterSummand"> <br> <br>
    <input type = submit name = "ergebnisAnfordern" value = "addieren" > <input type="submit" name = "multiplikationAnfordern" value = "multiplizieren">
</form>
<p><b> Das Ergebnis lautet: </b>
<?php
    if(!empty($_GET['ersterSummand']) && !empty($_GET['zweiterSummand']) && isset($_GET['ergebnisAnfordern'])){
        echo addieren($_GET["ersterSummand"],$_GET['zweiterSummand']);}
    else if(!empty($_GET['ersterSummand']) && !empty($_GET['zweiterSummand']) && isset($_GET['multiplikationAnfordern'])){
        echo multiplizieren($_GET["ersterSummand"],$_GET['zweiterSummand']);}
    else{
        echo 'Bitte zwei Zahlen eingeben';
    } ?></p>

</body>
</html>