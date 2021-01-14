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
        <img id= "logo-mensa" src="./img/MenaBild.jpg" width="800"  alt="Mensa-Logo">
        <br>
        <h2 id="login_begrüßung"> Bitte bewerten Sie ein Gericht:</h2>

        <form action="/bewertung_abgeben" method="post" id = "bewertung_formular">
            <br>
            <label for = "gericht">Gericht auswählen</label>
            <br>
            <select class="pfeil" name="gericht" id="gericht">
                @foreach($data as $a)
                    <option value={{$a['id']}}>{{$a['name']}}</option>
                @empty
                    @endforelse
            </select>
            <br> <br>
            <input id="submit" type="submit" name="submit" value="submit">
            <br>
            <br>
        </form>
    </div>
    <div class="rechts">
    </div>
</div>
</body>
</html>