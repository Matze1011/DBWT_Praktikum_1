@extends ('layout_emensa')

@section('title', 'EMensa Werbeseite')

@section('navbar')
    <!--Navbar oben mit Links-->
    <nav class="topnav">
        <img id= "logo" src="./public/img/logo-FH%20(1).png" height="30" alt="FH Logo">
        <a href="#ankündigung">Speisen</a>
        <a href="#preis-tabelle">Preise</a>
        <a href="#zahlen-mensa">Zahlen</a>
        <a href="#kontakt">Kontakt</a>
        <a href="#wichtig">Wichtig für uns</a>
        <a href="wunschgericht.php">Wunschgericht hinzufügen</a>
    </nav>
@endsection

@section('Begrüßung')
    <!-- Großes Mensa Bild -->
    <img id= "logo-mensa" src="../../../public/img/MenaBild.jpg" width="800"  alt="Mensa-Logo">
    <br>
    <h2 id="ankündigung"> Bald gibt es Essen auch online;)</h2>
@endsection

@section('main')
    <p><?php include ('speisenübersicht.php') ?>
    </p>
    <br>
    <h2>Preise unser Köstlichkeiten</h2>
    <!--Tabelle für die Preise -->
    <?php
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
    $sql =  "SELECT gericht.name, gericht.preis_intern, gericht.preis_extern, group_concat(allergen.code)
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
            '<td style="text-align: left">'.$row['name']."<br>"."Allergene:(".$row['group_concat(allergen.code)'].")".'</td>',
            '<td style="text-align: right">'.$row['preis_intern']."€"." "." ".'</td>',
            '<td style="text-align: right">'.$row['preis_extern']."€".'</td>',
        '</tr>';
    }
    echo '</table>';

    //Verbindung schließen und Speicher wieder freigeben
    mysqli_free_result($result);
    mysqli_close($link);
    ?>
    <br>

    <h2 id="zahlen-mensa">E-Mensa in Zahlen</h2>
    <ul id="mensa-zahlen">
        <!--Einlesen und ausgeben der Besucher Zahl -->
        <li><?php $datei="counter.txt";
            $fp = fopen($datei,"r+");
            $zahl = file_get_contents("counter.txt");
            echo $zahl; ?> Besucher </li>
        <li>
            <!-- Einlesen uns ausgeben der Newsletter Anmeldungen -->
            <?php $datei="newsletterZähler.txt";
            $fp = fopen($datei,"r+");
            $zahl = file_get_contents("newsletterZähler.txt");
            echo $zahl; ?> Anmeldungen zum Newsletter</li>
        <li>19 Speisen</li>
    </ul>
    <br>

    <h2>Interesse geweckt? Wir informieren Sie!</h2>

    <!-- Formular für Newsletter -->

    <form action = "formdata2.php" id="newsletter-formular" method ="post" >
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
                    <option value="Englisch">Englisch</option>
                    <option value="Deutsch" selected>Deutsch</option>
                    <option value="Spanisch">Spanisch</option>
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

    <?php if (empty($name)){
        $fehler = 'Der Name muss eingegeben werden und darf nicht leer sein';}?>

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

@endsection