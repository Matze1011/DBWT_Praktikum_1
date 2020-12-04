<!DOCTYPE html>
<html lang="de">
<head>
    <title>@yield('title')</title>
</head>
<body>
<header>
@section('header')
        Das hier ist der Header
@show
</header>
<main>
<div class ="container4">
        @section('main')
            Main Inhalt
</div>
</main>
<footer>
@section('footer')
    @show
    Unser Footer
</footer>
</body>
</html>