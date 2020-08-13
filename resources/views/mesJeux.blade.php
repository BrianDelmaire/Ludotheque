@extends("layout.master")


    <!DOCTYPE html>
<html>
<head>
    <title>MesJeux</title>
    <link rel="stylesheet" href="{{ asset('css/styleLudotheque.css') }}">
    <link rel="icon" href="">
</head>
<body>

@section('navbar')
    @parent
@endsection

@section('content')
<h1 style="margin-top: 100px">Mes jeux</h1>

@if(!(count($jeux) === 0))
@foreach($jeux as $j)
    @if(Auth::id() == $j->auteur_id)
        <table>
            <tr id="info">
                <td class="m">NOM</td>
                <td class="m">ANNEE DE SORTIE</td>
                <td class="m">AGE MIN</td>
                <td class="m">MIN-MAX JOUEUR</td>
                <td class="m">MIN-MAX DUREE</td>
                <td class="g">DESCRIPTION</td>
                <td class="m">Action</td>
            </tr>
        <tr>
            <td> {{$j->nom}}</td>
            <td>{{$j->annee_sortie}}</td>
            <td>{{$j->age_min}}</td>
            <td>{{$j->min_max_joueur}}</td>
            <td>{{$j->min_max_duree}}</td>
            <td>{{$j->description}}</td>
            <td>
                <a href="{{route('ludotheque/show',$j->id)}}?action=show"><button type="input" class="btn btn-primary">
                        Afficher
                    </button></a>
                <a href="{{route('ludotheque/edit',$j->id)}}"><button type="input" class="btn btn-primary">
                        Modifier
                    </button></a>

                <a href="{{route('ludotheque/show',$j->id)}}?action=delete"><button type="input" class="btn btn-primary">
                        Supprimer
                    </button></a>
            </td>
        </tr>
        @endif
    @endforeach
</table>
@else
    <p class="">Pas de jeux</p>
@endif
</body>
</html>
@endsection
