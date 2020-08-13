@extends("layout.master")
<!DOCTYPE html>
<html>
<head>
    <title>Edition - Jeu</title>
    <link rel="stylesheet" href="{{ asset('css/styleEdit.css') }}">
    <link rel="icon" href="">
</head>


<body>
@section('navbar')
    @parent
@endsection

@section('content')


@if(Auth::id() == $jeu->auteur_id)
@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form action="{{route('ludotheque/update',$jeu->id)}}" method="PUT">
    @csrf
    @method('PUT')
    <div class="text-center" style="margin-top: 2rem">
        <h3 style="margin-top: 100px">Modification d'un jeu</h3>
        <hr class="mt-2 mb-2">
    </div>
    <div>
        <label for="nom"><strong>nom</strong></label>
        <input type="string"  id="img" name="img"
               value="{{ $jeu->img}}">
    </div>
    <div>
        <label for="nom"><strong>nom</strong></label>
        <input type="string"  id="nom" name="nom"
               value="{{ $jeu->nom}}">
    </div>
    <div>
        <label for="annee_sortie"><strong>annee_sortie</strong></label>
        <input type="int"  id="annee_sortie" name="annee_sortie"
               value="{{ $jeu->annee_sortie}}">
    </div>
    <div>
        <label for="age_min"><strong>age_min</strong></label>
        <input type="int"  id="age_min" name="age_min"
               value="{{ $jeu->age_min}}">
    </div>
    <div>

        <label for="min_max_joueur"><strong>min_max_joueur</strong></label>
        <input type="string"  id="min_max_joueur" name="min_max_joueur"
               value="{{ $jeu->min_max_joueur}}">
    </div>
    <div>

        <label for="min_max_duree"><strong>min_max_duree</strong></label>
        <input type="string"  id="min_max_duree" name="min_max_duree"
               value="{{ $jeu->min_max_duree}}">
    </div>
    <div>

        <label for="description"><strong>description</strong></label>
        <textarea type="text"  id="description" name="description"
        >{{ $jeu->description}}</textarea>
    </div>
    <div>
        <button class="btn btn-success" type="submit">Valide</button>
    </div>
    @auth
        <input type="hidden" value="{{Auth::user()->id}}" name="auteur_id">
        <div class="text-center" style="margin-top: 2rem">
        </div>
    @endauth
</form>
    @else
    <h1>Vous n'avez pas les droits</h1>
    <h1>Vous n'avez pas les droits</h1>
    <h1>Vous n'avez pas les droits</h1>
    @endif
@endsection
</body>
</html>
