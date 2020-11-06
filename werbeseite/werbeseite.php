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
    <title>E-Mensa Werbeseite</title>
</head>
<body>
<main>
    <div id="grid-container1">
        <div class="links>"></div>
        <div class="mitte-inhalt">
            <!--Navbar oben mit Links-->
            <nav class="topnav">
                <img id= "logo" src="../beispiele/logo-FH%20(1).png" height="30" alt="FH Logo">
                <a href="#ankündigung">Speisen</a>
                <a href="#preis-tabelle">Preise</a>
                <a href="#zahlen-mensa">Zahlen</a>
                <a href="#kontakt">Kontakt</a>
                <a href="#wichtig">Wichtig für uns</a>
            </nav>
            <!-- Großes Mensa Bild -->
        <img id= "logo-mensa" src="../beispiele/MenaBild.jpg" width="800" alt="Mensa-Logo">
        <br>
        <h2 id="ankündigung"> Bald gibt es Essen auch online;)</h2>
            <p><?php include ('speisenübersicht.php') ?>
            </p>
            <br>
            <h2>Preise unser Köstlichkeiten</h2>
            <!--Tabelle für die Preise -->
            <table id="preis-tabelle" style="background-color:#40BEA9">
                <tr style="background-color: #40BEA9;color: white">
                    <th> </th><th style="text-align: left">Preis intern</th><th style="text-align: left">Preis extern</th>
                </tr>
                <tr style="background-color: white">
                    <td style="text-align: left">Rindfleisch mit Bambus, Kaiserschoten <br> und rotem Paprika, dazu Mie Nudeln</td> <td>3,50€</td> <td>6,20€</td>
                </tr>
                <tr style="background-color: white">
                    <td style="text-align: left">Spinatrisotto mit kleinen Samosateigecken<br> und gemischtem Salat</td> <td>2,90€</td> <td>5,30€</td>
                </tr>
                <tr style="background-color: white">
                    <td style="text-align: left">Pizza Hawaii mit köstlichem Käse <br> und frischen Ananas</td> <td>3,90€</td> <td>5,90€</td>
                </tr>
                <tr style="background-color: white">
                    <td style="text-align: left">Nudeln in köstlicher Käse Sauce mit <br>saftigen Speck Streifen und Parmesan</td> <td>3,90€</td> <td>5,90€</td>
                </tr>

            </table>
            <br>

            <h2 id="zahlen-mensa">E-Mensa in Zahlen</h2>
                <ul id="mensa-zahlen">
                    <li>143 Besuche</li>
                    <li>50 Anmeldungen zum Newsletter</li>
                    <li>7 Speisen</li>
                </ul>
            <br>

            <h2>Interesse geweckt? Wir informieren Sie!</h2>

            <!-- Formular für Newsletter -->

            <form action = "formdata.php" id="newsletter-formular" method ="post" onsubmit="return true">
                <fieldset class="formular-felder">
                        <div style="float: left">
                        <label for="name" style="float: left">Ihr Name:</label>
                        <br>
                        <input type="text" id="name" name="benutzer" size="30"   placeholder="Bitte Namen eingeben">
                        </div>

                        <div style="float: left">
                        <label for="email" style="float:left">Ihre E-Mail</label>
                            <br>
                        <input type="email" id="email" name="mail" size="30" required placeholder="Bitte geben Sie Ihre E-Mail ein">
                        </div>
                        <div style="float: right">
                            <label for = "sprache"> Newsletter bitte in</label>
                            <br>
                            <select class="pfeil" name="sprache" id="sprache" style= "width: 120px">
                                <option value="1">Englisch</option>
                                <option value="2" selected>Deutsch</option>
                                <option value="3">Spanisch</option>
                            </select>
                        </div>
                    <br>
                        <div style="float: left">
                        <input type="checkbox" required name="datenschutz" id="Datenschutz" value = "zugestimmt">
                        <label for="Datenschutz">Den Datenschutzbestimmungen stimme ich zu</label>
                        </div>
                        <br>
                    <br>
                        <input id="submit-button" type="submit" name="senden" value="Zum Newsletter anmelden">
                </fieldset>
            </form>
            <?php if (empty($userName)){
    $fehler = 'Der Name muss eingegeben werden und darf nicht leer sein';
}?>
            <h2 id="wichtig">Das ist uns wichtig</h2>

                <ul id="auflistung">
                <li>Beste frische saisonale Zutaten</li>
                <li>Ausgewogene abwechselungsreiche Gerichte</li>
                <li>Sauberkeit</li>
                </ul>
                <br>

            <h2>Wir freuen uns auf ihren Besuch!</h2>

        </div>
        <div class="rechts"></div>
    </div>
</main>

<footer id="kontakt">
    <ul>
        <li>&nbsp;(c) E-Mensa GmbH &nbsp; </li>
        <li>&nbsp;Marcel Buschmann und Michael Buschmann &nbsp;</li>
        <li id="impressum">&nbsp;Impressum &nbsp;</li>
    </ul>
</footer>



</body>
</html>