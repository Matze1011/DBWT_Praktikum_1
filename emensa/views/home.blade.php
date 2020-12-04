<!DOCTYPE html>
<html lang="de">
<head>
    <title>E-Mensa</title>
    <style type="text/css">
        body {background-color: {{$rd->query['bgcolor'] ?? 'ffffff'}} }
    </style>
</head>
<body>
    <header>
        <h1>Hauptseite E-Mensa</h1>
        <img src="./img/test.jpg" alt="Testbild von https://cdn.pixabay.com/photo/2014/06/03/19/38/road-sign-361513_960_720.jpg">
    </header>
    <nav>
        Navigation
        <ul>
            <li><a href="/demo/demo">Demo</a></li>
            <li><a href="/demo/dbconnect">Datenbank: Gerichte</a></li>
            <li><a href="/example/m4_6a_queryparameter">Aufgabe 6.1</a></li>
            <li><a href="/example/m4_6b_kategorie">Aufgabe 6.2</a></li>
            <li><a href="/example/m4_6c_gerichte">Aufgabe 6.3</a></li>
            <li><a href="/example/m4_6d_layout">Aufgabe 6.4</a></li>
        </ul>
    </nav>
    <footer>
        &copy; Team-Name DBWT
    </footer>
</body>
</html>