<!DOCTYPE html>

<html lang="de">
<head>
    <meta content="width=device-width, initial-scale=1" name="viewport" charset="utf-8" />
    <meta charset="utf-8">
    <title>Meine Bewertungen</title>

    <link rel="stylesheet" href="./css/stylesheet_werbeseite.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <style>
        .checked {
            color: orange;
        }
    </style>
</head>
<body>
<div id="grid-container1">
    <div class="links>"></div>
    <div class="mitte-inhalt">
        <a href="/">Home</a>
<div><img id= "logo-mensa" src="./img/MenaBild.jpg" width="600"  alt="Mensa-Logo"></div>
<h2>Meine Bewertungen</h2>


<?php $i=0 ?>
@foreach($data as $dat)
    <p>Nummer: {{++$i}}</p>
    <p>Zu Gericht: {{$dat["gericht_id"]}}</p>
    <p>{{$dat["bemerkung"]}}</p>
    <p>Datum: {{$dat["created_at"]}}</p>
    @if($dat["sternebewertung"] == "1")
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
    @elseif($dat["sternebewertung"] == "2")
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star "></span>
        <span class="fa fa-star "></span>
    @elseif($dat["sternebewertung"] == "3")
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star "></span>
    @elseif($dat["sternebewertung"] == "4")
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
    @endif

    <form action="loeschen_bewertungen" method="POST">
        <input type="hidden" name="review_id" id="review_id" value="{{$dat["id"]}}">
        <input type="submit" value="Löschen"/>
    </form>
    ===============================================
@endforeach
    </div>
    <div class="rechts">
    </div>
</div>

</body>
</html>