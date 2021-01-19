@extends ('layout_emensa')

@section('title', 'EMensa Werbeseite')

@section('navbar')
    @if($login_status == true){{ 'Angemeldet als: '. $_SESSION['User']['email'] }}
    @endif
    <!--Navbar oben mit Links-->
    <nav class="topnav">
        <img id= "logo" src="./img/logo-FH%20(1).png" height="15" alt="FH Logo">
        <a href="#ankündigung">Speisen</a>
        <a href="#preis-tabelle">Preise</a>
        <a href="#zahlen-mensa">Zahlen</a>
        <a href="#kontakt">Kontakt</a>
        <a href="#wichtig">Wichtig für uns</a>
        <a href="wunschgericht.php">Wunschgericht</a>
        @if($login_status==false)
            <a href= "/login">Login</a>
        @else
            <a href="/logout">Logout</a>
        @endif
        <div id="navbarElemente"> @if (isset($_SESSION['User'])) <a href="/meinebewertungen" >Meine Bewertungen</a> @endif

        @if($login_status==true)
            <a href="/bewertungen">Bewertungen</a>
        @else
            <a href="/login">Bewertungen</a>
        @endif
            <a href="/pinned_bewertungen">Beste Bewertungen</a>
        </div>
    </nav>
@endsection

@section('Begrüßung')
    <!-- Großes Mensa Bild -->
    <img id= "logo-mensa" src="./img/MenaBild.jpg" width="800"  alt="Mensa-Logo">
    <br>
    <h2 id="ankündigung"> Bald gibt es Essen auch online</h2>

@endsection

@section('main')

    <h2>Preise unserer Köstlichkeiten</h2>
    <!--Tabelle für die Preise -->



    <table id="preis-tabelle" style="background-color:#40BEA9">
    <tr style="background-color: #40BEA9;color: white">
         <th> </th><th>Bild</th><th style="text-align: left">Preis intern</th><th style="text-align: left">Preis extern</th><th style="text-align: left">Bewertung</th>
    </tr>
        @foreach ($gerichte as $Gericht)
        <tr style="background-color: white">
            <td style="text-align: left">{{$Gericht["name"]}}<br> {{'Allergene:' .$Gericht['group_concat(allergen.code)']}} </td>
            <td> <img src="./img/gerichte/{{$Gericht["bildname"]}}" width="90" height="80" alt="Foto"> </td>
            <td style="text-align: right">{{number_format ($Gericht['preis_intern'], 2, ",", ".")}} €</td>
            <td style="text-align: right">{{number_format ($Gericht['preis_extern'], 2, ",", ".")}} €</td>
            <td style="text-align: center;"><a @if ($login_status==true)href="/bewertung?gerichtid={{$Gericht["id"]}}" @else href="/bewertung" @endif>Bewertung abgeben</a></td>
        </tr>
        @endforeach
    </table>


    <br>
    <h2 id="zahlen-mensa">E-Mensa in Zahlen</h2>
    <ul id="mensa-zahlen">
        <!--Einlesen und ausgeben der Besucher Zahl -->
        <li><?php $datei="counter.txt";
            $fp = fopen($datei,"a+");
            $zahl = file_get_contents("counter.txt");
            echo $zahl; ?> Besucher </li>
        <li>
            <!-- Einlesen uns ausgeben der Newsletter Anmeldungen -->
            <?php $datei="newsletterZähler.txt";
            $fp = fopen($datei,"a+");
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



@endsection

@section('footer')
    <ul>
        <li>&nbsp;(c) E-Mensa GmbH &nbsp; </li>
        <li>&nbsp;Marcel Buschmann und Michael Buschmann &nbsp;</li>
        <li id="impressum">&nbsp;Impressum &nbsp;</li>
    </ul>
@endsection