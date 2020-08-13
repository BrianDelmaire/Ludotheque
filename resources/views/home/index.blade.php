<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


        <title>Ludothéque</title>
    </head>
    <body style="background-color: #DEDDDD;">
    <h1 style="text-align: center;">Bienvenue sur la Ludothéque</h1>


    <div class="text-center">
    <img src="{{asset('images/background.png')}}" alt="" class="rounded" style="height: auto;; width: 1000px;">
    </div>


<br>
    <div class="row">
        <div class="col px-md-6 text-center">
            <a href="/home/about"><button type="input" class="btn btn-primary">
                About
            </button></a>
            <a href="/home/contact" style="padding-left: 10px;"><button type="input" class="btn btn-primary">
                    Contact
                </button></a>


        </div>
        @if (Route::has('login'))
            @auth


            <div class="col px-md-6 text-center" >
                <a href="{{ route('register') }}" style="padding-left: 10px;"><button type="input" class="btn btn-primary">
                        Register
                    </button></a>
                <a href="{{ route('login') }}" style="padding-left: 10px;"><button type="input" class="btn btn-primary">
                        Login
                    </button></a>
                <br>
                <br>
                <a href="{{route('ludotheque/index')}}"><button type="input" class="btn btn-primary">
                        Entrer sans se connecter
                    </button></a>

            </div>
    </div>
    </body>
</html>
