<!doctype html>
<!--
-Praktikum DBWT. Autoren:
-Marcel, Buschmann, 3220186
-Michael Buschmann, 3220197
-->
<html>
<head>
    <title>{{$title}}</title>
</head>
<body>
<div class="Aufgabe 6.2">
    <h1>Daten aus der Datenbank der Tabelle: Kategorie</h1>
    @forelse($data as $a) {{-- For Schleife --}}
        <li>{{$a['name']}}</li>
    @empty //falls leer
        <li>Keine Daten vorhanden.</li>
    @endforelse {{--Wenn keine Daten mehr vorhanden sind nichts mehr ausgeben--}}
</div>
</body>
</html>
