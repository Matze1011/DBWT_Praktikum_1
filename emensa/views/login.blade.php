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
    <title>Login Emensa</title>
</head>
<body>
<div id="grid-container1">
    <div class="links>"></div>
    <div class="mitte-inhalt">
        <img id= "logo-mensa" src="./img/MenaBild.jpg" width="800"  alt="Mensa-Logo">
        <br>
        <h2 id="login_begrüßung"> Bitte loggen sie sich ein:)</h2>
            {{$msg}}

        <form action="/check_login" method="post" id = "login_window">
            <br>
            <label for="username">Benutzer</label>
            <input id="username" name="username">

            <label for="password">Passwort</label>
            <input id="password" name="password" type="password">
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