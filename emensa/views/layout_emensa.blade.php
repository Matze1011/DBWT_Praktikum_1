<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/stylesheet_werbeseite.css">
    <title>@yield('title')</title>
</head>


<body>
<header>
    <div id="grid-container1">
        <div class="links>"></div>
        <div class="mitte-inhalt">
    @section('navbar')

    @show
        </div>
        <div class="rechts"></div>
    </div>
</header>
<div id="grid-container1">
    <div class="links>"></div>
    <div class="mitte-inhalt">
        @section('Begrüßung')
        @show
    </div>
    <div class="rechts"></div>
</div>
<main>
    <div id="grid-container1">
        <div class="links>"></div>
        <div class="mitte-inhalt">
        @section('main')
                Main Inhalt
            @show
        </div>
        <div class="rechts"></div>
    </div>
</main>
<footer id="kontakt">
    @section('footer')
        Unser Footer
    @show

</footer>
</body>
</html>
