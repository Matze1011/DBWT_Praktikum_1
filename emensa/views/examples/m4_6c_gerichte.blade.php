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
<div class="Aufgabe 6.3">
    <h1>Gerichte,die mehr als 2 Euro kosten aus der Datenbank der Tabelle: Gerichte</h1>
    @forelse($data as $a) {{-- For Schleife --}}
    <li>{{$a['name']}}
        {{number_format($a['preis_intern'],2)}}&euro;
    </li>
    @empty //falls leer
    <li>Es sind keine Gerichte vorhanden.</li>
    @endforelse {{--Wenn keine Daten mehr vorhanden sind nichts mehr ausgeben--}}
</div>
</body>
</html>

