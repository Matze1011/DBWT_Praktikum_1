<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" charset="utf-8" />
    <title>Bewertungen</title>
    <link rel="stylesheet" type="text/css" href="./css/stylesheet_werbeseite.css" media="screen" />
    <link rel="stylesheet" href="./css/bootstrap.css">
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
        <div><img id= "logo-mensa" src="./img/MenaBild.jpg" width="600"  alt="Mensa-Logo"></div>
<h2>30 Bewertungen</h2>
<p style="color:orange">
    @if(isset( $_SESSION['hervorhebung_abwaehlen']))
        {{$_SESSION['hervorhebung_abwaehlen']}}
        @unset($_SESSION['hervorhebung_abwaehlen'])
    @endif
</p>
<p style="color:green">
    @if(isset( $_SESSION['hervorheben']))
        {{$_SESSION['hervorheben']}}
        @unset($_SESSION['hervorheben'])
    @endif
</p>
<p style="color:red">
    @if(isset( $_SESSION['hervorheben_error']))
        {{$_SESSION['hervorheben_error']}}
        @unset($_SESSION['hervorheben_error'])
    @endif
</p>

<br>

<?php $i=0 ?>
    @foreach($data as $dat)
        @if($dat['is_pinned']==1)
            {{$_SESSION['hervorheben']}}
            <p style="color:green">Nummer: {{++$i}}</p>
            <p style="color:green">Bemerkung: {{$dat["bemerkung"]}}</p>
            <p style="color:green">Datum: {{$dat["created_at"]}}</p>
            <p style="color:green">Zu Gericht: {{$dat["gericht_id"]}}</p>
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

            @else
            <p>Nummer: {{++$i}}</p>
            <p>Bemerkung: {{$dat["bemerkung"]}}</p> <p>{{$dat["created_at"]}}</p>
            <p>Zu Gericht: {{$dat["gericht_id"]}}</p>
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
            @endif

            <form action="loeschen_bewertungen" method="POST">
                <input type="hidden" name="review_id" id="review_id" value="{{$dat["id"]}}">
                <input type="submit" value="Löschen"/>
            </form>
            @if(!$dat["is_pinned"] == 1)
                <a href="/hervorheben?id={{$dat["id"]}}" >Hervorheben</a>
            @else
            <a href="/hervorhebung_abwaehlen?id={{$dat["id"]}}" >Hervorhebung abwählen</a>
                <br>
            @endif

            <br>
    @endforeach
    </div>
<div class="rechts">
</div>
</div>

</body>
</html>