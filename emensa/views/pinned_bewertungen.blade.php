<!DOCTYPE html>
<!--
-Praktikum DBWT. Autoren:
-Marcel Buschmann, 3220186
-Michael Buschmann, 3220197
-->
<html lang="de">
<head>
    <meta content="width=device-width, initial-scale=1" name="viewport" charset="UTF-8">
    {{--Für Styling --}}
    <link rel="stylesheet" href="./css/stylesheet_werbeseite.css">
    <link rel="stylesheet" href="./css/stylesheet_bewertung.css">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <style>
        .checked {
            color: orange;
        }
    </style>

    {{-- Für die mobile Ansicht --}}

    <title>Bewertungen unserer Gäste:</title>

</head>
<body>
<div id="grid-container1">
    <div class="links>"></div>
    <div class="mitte-inhalt">
        <div><img id= "logo-mensa" src="./img/MenaBild.jpg" width="600"  alt="Mensa-Logo"></div>
        <div><h2 id="login_begrüßung"> Bewertungen unserer Gäste:</h2></div>

        <?php $i=0 ?>
       @foreach($data as $bewertungen)
            <div><p>Bewertung Nummer: {{++$i}}</p>
            <p>Zu Gericht: {{$bewertungen->gericht_id}}</p>
                   @if($bewertungen->sternebewertung == "1")
                       <span class="fa fa-star checked"></span>
                       <span class="fa fa-star"></span>
                       <span class="fa fa-star"></span>
                       <span class="fa fa-star"></span>
                   @elseif($bewertungen->sternebewertung == "2")
                       <span class="fa fa-star checked"></span>
                       <span class="fa fa-star checked"></span>
                       <span class="fa fa-star "></span>
                       <span class="fa fa-star "></span>
                   @elseif($bewertungen->sternebewertung == "3")
                       <span class="fa fa-star checked"></span>
                       <span class="fa fa-star checked"></span>
                       <span class="fa fa-star checked"></span>
                       <span class="fa fa-star "></span>
                   @elseif($bewertungen->sternebewertung == "4")
                       <span class="fa fa-star checked"></span>
                       <span class="fa fa-star checked"></span>
                       <span class="fa fa-star checked"></span>
                       <span class="fa fa-star checked"></span>
                   @endif</p></div>

            <p>Bemerkung: {{$bewertungen->bemerkung}}</p>
           <p style="color:#40BEA9 ">===========================================================</p>

        @endforeach
    </div>
    <div class="rechts">
    </div>
</div>
</body>
</html>
