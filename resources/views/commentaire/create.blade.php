@extends("layout.master")

<!DOCTYPE html>

<html>
<head>
    <title>Créer - Commentaire</title>
    <link rel="icon" href="">
    <link rel="stylesheet" href="{{ asset('css/styleCreate.css') }}">
</head>


<body>
@section('navbar')
    @parent
@endsection

@section('content')
<h1 style="margin-top: 100px">Ajouter commentaire</h1>
{{--
   messages d'erreurs dans la saisie du formulaire.
--}}


@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{--
     formulaire de saisie d'une tâche
     la fonction 'route' utilise un nom de route
     'csrf_field' ajoute un champ caché qui permet de vérifier
       que le formulaire vient du serveur.
  --}}

<form action="{{route('commentaire/store')}}" method="POST">
    {!! csrf_field() !!}

    <input type="hidden" value="{{$jeu_id}}" name="jeu_id">
    <div class="text-center" style="margin-top: 2rem">
        <h3>Création d'un commentaire</h3>
        <hr class="mt-2 mb-2">
    </div>

    <div>
        {{-- le nom  (for = pour c pas une boucle--}}
        <label for="nom"><strong>titre : </strong></label>
        <input type="string" name="titre"
               value="{{ old('titre') }}"
               placeholder="titre">
    </div>

    <div>
        <label for="body"><strong>body</strong></label>
        <input type="string"  name="body" placeholder="blabla..."
               value="{{ old('body') }}">
    </div>
    @auth
        <input type="hidden" value="{{Auth::user()->name}}" name="auteur">
    @endauth
    <div>
        <button class="btn btn-success" type="submit">Valide</button>
    </div>
</form>
@endsection
</body>
</html>
