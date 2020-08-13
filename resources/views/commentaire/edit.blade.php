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
    <h1 style="margin-top: 100px">Modifier - commentaire</h1>

@if(Auth::user()->name == $commentaire->auteur)

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<form action="{{route('commentaire/update',$commentaire->id)}}" method="PUT">
        @csrf

    @method('PUT')
        <input type="hidden" value="{{$commentaire->jeu_id}}" name="jeu_id">

        <div class="text-center" style="margin-top: 2rem">
            <h3 style="margin-top: 100px">Modification d'un jeu</h3>
            <hr class="mt-2 mb-2">
        </div>
        <div>
            <label for="titre"><strong>titre</strong></label>
            <input type="string"  id="nom" name="titre"
                   value="{{ $commentaire->titre}}">
        </div>
        <div>
            <label for="titre"><strong>body</strong></label>
            <input type="string"  id="body" name="body"
                   value="{{ $commentaire->body}}">
        </div>
        <input type="hidden" value="{{Auth::user()->name}}" name="auteur">
        <div>
            <button class="btn btn-success" type="submit">Valide</button>
        </div>
    </form>

    <form action="{{route('commentaire/destroy',$commentaire->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <div class="text-center">
            <p>Voulez-vous supprimer définitvement : {{$commentaire->titre}}</p>
            <button type="submit" name="delete" value="valide">Valide</button>
            <button type="submit" name="delete" value="annule">Annule</button>
        </div>
    </form>
    @else
    <h1>Vous n'avez pas les droits</h1>
@endif

</body>
</html>
