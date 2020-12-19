<!DOCTYPE html>
<html lang="de">
<head>
    <title>@yield('title')</title>
    <form method="get">
        <select name="no" id="page">
            <option value="1" selected>1</option>
            <option value="2" >2</option>
        </select>
        <input type="submit" name = "submitted">
    </form>

    <br>
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