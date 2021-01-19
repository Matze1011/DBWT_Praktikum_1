<!DOCTYPE html>
<!--
-Praktikum DBWT. Autoren:
-Marcel, Buschmann, 3220186
-Michael Buschmann, 3220197
-->
<html lang="de">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/stylesheet_werbeseite.css">
    <title>Wunschgericht</title>
</head>
<body>
<main2>
    <div class="grid-container3" >
        <div class="links>"></div>
        <div class="Mitte_Inhalt" style="border: #40BEA9 solid">
            <a href="/">Home</a>
            <div><img id= "logo-mensa" src="./img/MenaBild.jpg" width="600"  alt="Mensa-Logo"></div>
            <p><h3>Bitte erstellen Sie ihr Wunschgericht:</h3></p>

            <form  method="post" action="/wunschgericht_formdata" id="wunschgericht_formular">
                <!-- Gericht Daten -->
                <label for="Name_Gericht">Name des Gerichts:</label>
                <br>
                <input type="text" id="Name_Gericht" name="gerichtname" size="50"  required placeholder="Bitte geben Sie den Name ihres Gerichts ein">
                <br>
                <label for ="Beschreibung_Gericht">Beschreibung:</label>
                <br>
                <textarea id="Beschreibung_Gericht" name="beschreibung" cols = "47" rows ="5"  required placeholder="Bitte Beschreibung des Gerichts eingeben"></textarea>
                <br>
                <br>
                <br>

                <h3>Bitte geben Sie ihren Namen und eine E-Mail Adresse ein:</h3>
                <label for="Name_Ersteller">Ihr Name:</label>
                <br>
                <input type="text" id="Name_Ersteller" name="erstellername" size="50"  required placeholder="Bitte Namen eingeben">
                <br>
                <label for ="Beschreibung_Gericht">E-Mail Adresse:</label>
                <br>
                <input type="email" id="EMail_Ersteller" name="email" size="50"  required placeholder="Bitte E-Mail Adresse eingeben">
                <br>
                <br>
                <input type="submit" value="Wunsch abschicken" id = "senden_button" name="senden_button">
                <br>
                <br>
            </form>


        </div>
        <div class="rechts>"></div>
    </div>
</main2>
</body>
</html>