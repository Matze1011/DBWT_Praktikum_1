<!DOCTYPE html>

<html lang="de">
<head>
    <meta charset="utf-8">
    <title>Meine Bewertungen</title>
   <link rel="stylesheet" href="../public/css/bootstrap.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <style>
        .checked {
            color: orange;
        }
    </style>
</head>
<body>
<h1>Meine Bewertungen</h1>

<br>

<?php $i=0 ?>
@foreach($data as $dat)
    <p>NUMMER: {{++$i}}</p>
    <p>{{$dat["bemerkung"]}}</p> <p>{{$dat["date"]}}</p>
    <p>ZU GERICHT: {{$dat["gericht_id"]}}</p>
    {{--<p>RATING: {{$dat["review_rating"]}}</p>--}}
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
        <input type="submit" value="DELETE"/>
    </form>
    ===========================
@endforeach


</body>
</html>