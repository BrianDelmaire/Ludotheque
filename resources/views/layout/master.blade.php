@extends('layout.navbar')

<html>
<head>
    @section('navbar')
    @show
    <title>Ludothèque - @yield('title')</title>
</head>
<body>

<div class="container">
    @yield('content', 'En Attente d\'un contenu')
</div>

<footer id="sticky-footer" class="py-4 bg-dark text-white-50" style="flex-shrink: none; margin-top: 10px; z-index: 3; margin-bottom: 0; height: 5vh; padding-top: 1vh; bottom: 0; position: fixed; width: 100%; ">
    @section('footer')
        <p style="text-align: center">IUT de Lens - Département Info - Ludothèque</p>
    @show
</footer>

</body>
</html>
