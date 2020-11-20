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
//Verbindung herstellen
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

$sql = "SELECT name,preis_intern,preis_extern FROM gericht";
$result = mysqli_query($link, $sql);
echo '<ul>';
while ($row = mysqli_fetch_assoc($result)) {
    echo '<li>',
        $row['name']."<br>",
        "Preis intern: ".$row['preis_intern']. ""."€"."/",
        "Preis extern: ".$row['preis_extern']."€", '</li>';
}
echo '</ul>';

?>
</body>
</html>
