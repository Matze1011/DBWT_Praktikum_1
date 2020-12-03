<!DOCTYPE html>
<!--
-Praktikum DBWT. Autoren:
-Marcel, Buschmann, 3220186
-Michael Buschmann, 3220197
-->
<html lang="de">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="stylesheet_werbeseite.css">
    <title>Wunschgericht</title>
</head>
<body>
<main>
<div class="grid-container3" style="border: #40BEA9 solid">
    <div class="grid-item">
        <p><h3>Bitte erstellen Sie ihr Wunschgericht:</h3></p>

        <form  method="post">
            <label for="Name_Gericht">Name des Gerichts:</label>
            <br>
            <input type="text" id="Name_Gericht" name="Name" size="50"  required placeholder="Bitte geben Sie den Name ihres Gerichts ein">
            <br>
        </form>

<?php
//Verbindung aufbauen zu der Datenbank
$link = mysqli_connect(
    "127.0.0.1", // Host der Datenbank
    "root", // Benutzername zur Anmeldung
    "Matze0021", // Passwort zur Anmeldung
    "emensawerbeseite"); // Auswahl der Datenbank

mysqli_set_charset($link, "utf8");
?>

    </div>
</div>
</main>
</body>
</html>