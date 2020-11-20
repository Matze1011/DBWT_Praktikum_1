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

<?php
/**
-Praktikum DBWT. Autoren:
-Marcel, Buschmann, 3220186
-Michael Buschmann, 3220197
 */

$link = mysqli_connect(
    "127.0.0.1", // Host der Datenbank
    "root", // Benutzername zur Anmeldung
    "Matze0021", // Passwort zur Anmeldung
    "emensawerbeseite"); // Auswahl der Datenbank

mysqli_set_charset($link, "utf8");

if (!$link) {
    echo "Verbindung fehlgeschlagen: ", mysqli_connect_error();
    exit();
}
//Tabelle der Preise und Gerichte mittels Datenbank:
$sql =  "SELECT gericht.name, gericht.preis_intern, gericht.preis_extern, group_concat(allergen.code), group_concat(allergen.name) 
                        FROM gericht 
                        LEFT JOIN gericht_hat_allergen ON gericht.id=gericht_hat_allergen.gericht_id
                        LEFT JOIN allergen ON allergen.code=gericht_hat_allergen.code 
                        GROUP BY gericht.name
                        ORDER BY gericht.name ASC LIMIT 5";
$result = mysqli_query($link, $sql);
echo '<table id="preis-tabelle" style="background-color:#40BEA9">';
   echo     '<tr style="background-color: #40BEA9;color: white">
         <th> </th><th style="text-align: left">Preis intern</th><th style="text-align: left">Preis extern</th>
         </tr>';
while ($row = mysqli_fetch_assoc($result)) {

    echo '<tr style="background-color: white">',
        '<td style="text-align: left">'.$row['name']."(".$row['group_concat(allergen.code)'].")".'<br>'."(".$row['group_concat(allergen.name)'].")".'</td>',
        '<td style="text-align: right">'.$row['preis_intern']."€"." "." ".'</td>',
        '<td style="text-align: right">'.$row['preis_extern']."€".'</td>',
        '</tr>';
}
echo '</table>';
?>

</body>
</html>
