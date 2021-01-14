<!DOCTYPE html>
<!--
-Praktikum DBWT. Autoren:
-Marcel Buschmann, 3220186
-Michael Buschmann, 3220197
-->
<html lang="de">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/stylesheet_werbeseite.css">
    <title>Bewertung unserer Gerichte</title>
</head>
<body>
<div id="grid-container1">
    <div class="links>"></div>
    <div class="mitte-inhalt">
        <img id= "logo-mensa" src="./img/MenaBild.jpg" width="700"  alt="Mensa-Logo">
        <br>
        <h2 id="login_begrüßung"> Bitte bewerten Sie ein Gericht:</h2>

        <form action="/bewertung_gericht_ausgesucht" method="post" id = "bewertung_formular">
            <br>
            <label for = "gericht">Gericht auswählen</label>
            <br>
            <select class="gericht_select" name="gericht_bild" id="gericht_bild">
                @foreach($data as $a)

                    <option value={{$a['bildname']}} selected>{{$a['name']}} </option>


                @empty
                    @endforelse
            </select>
            <input id="submit" type="submit" name="submit" value="auswählen">
            <br>
            <br>
        </form>
            @if($_POST['gericht_bild']!= null)
            <?php
            $gericht_bild = $_POST['gericht_bild'];
            echo '<img src="./img/gerichte/'.$gericht_bild.'" witdh="400" height="200" alt="Foto nicht gefunden">'
            ?>
        @else
        @endif

    </div>
    <div class="rechts">
    </div>
</div>
</body>
</html>