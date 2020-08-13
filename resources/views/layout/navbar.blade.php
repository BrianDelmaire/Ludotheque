<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<nav class="navbar navbar-expand-lg fixed-top navbar-light" style="background-color: #e3f2fd;">
    <a class="navbar-brand" href="{{route('ludotheque/index')}}">Ludothèque</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{route('ludotheque/index')}}">Jeux <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('tag/index')}}">Tags</a>
            </li>
            @auth
            <li class="nav-item">
                <a class="nav-link" href="{{route('commentaire/index')}}">Mes Commentaires</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('ludotheque/mesJeux')}}">Mes Jeux</a>
            </li>
            @endauth
        </ul>
    </div>

    <div class="">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="">Bienvenu : {{Auth::user()->name}}</a>
                    <a class="log-out-btn" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> Logout </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
</nav>


<br><br><br>

