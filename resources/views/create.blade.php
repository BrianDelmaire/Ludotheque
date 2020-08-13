@extends("layout.master")
<!DOCTYPE html>
<html>
<head>
    <title>Créer - Jeu</title>
    <link rel="stylesheet" href="{{ asset('css/styleCreate.css') }}">
    <link rel="icon" href="">
</head>


<body>
@section('navbar')
    @parent
@endsection

@section('content')
@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form action="{{route('ludotheque/store')}}" method="POST">
    {!! csrf_field() !!}
    <div class="text-center" style="margin-top: 2rem">
        <h3 style="margin-top: 100px">Création d'un jeu</h3>
        <hr class="mt-2 mb-2">
    </div>

    <div>

        <label for="img"><strong>URL img : </strong></label>
        <input type="string" name="img" id="img"
               value="{{ old('img') }}"
               placeholder="images/nomDeLImage.png/.jpg/...">
    </div>
    <div>
        <label for="nom"><strong>nom : </strong></label>
        <input type="string" name="nom" id="nom"
               value="{{ old('nom') }}"
               placeholder="Nom du jeu">
    </div>

    <div>
        <label for="annee_sortie"><strong>annee_sortie</strong></label>
        <input type="integer" id="annee_sortie" name="annee_sortie" placeholder="EX : 2008"
               value="{{ old('annee_sortie') }}">
    </div>
    <div>
        <label for="age_min"><strong>age_min</strong></label>
        <input type="integer" id="age_min" name="age_min" placeholder="EX : 8"
               value="{{ old('age_min') }}">
    </div>
    <div>
        <label for="min_max_duree"><strong>min_max_duree :</strong></label>
        <input type ="string" name="min_max_duree" id="min_max_duree"
                  placeholder="EX : De .. à .. ">{{ old('min_max_duree') }}
    </div>
    <div>
        <label for="min_max_joueur"><strong>min_max_joueur :</strong></label>
        <input type ="string" name="min_max_joueur" id="min_max_joueur"
                  placeholder="EX : De .. à .. joueurs">{{ old('min_max_joueur') }}
    </div>
    <div>
        <label for="description"><strong>Description :</strong></label>
        <textarea type ="text" name="description" id="description"
                  placeholder="Description..">{{ old('description') }}</textarea>
    </div>
    @auth
    <input type="hidden" value="{{Auth::user()->id}}" name="auteur_id">
    <div class="text-center" style="margin-top: 2rem">
    </div>
    @endauth
    <div>
        <button class="btn btn-success" type="submit">Valide</button>
    </div>
</form>
@endsection
</body>

</html>
