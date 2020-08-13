@extends("layout.master")

<!DOCTYPE html>
<html>
<head>
    <title>Ludotheque</title>
    <link rel="stylesheet" href="{{ asset('css/styleLudotheque.css') }}">
    <link rel="icon" href="">
</head>
<body>

@section('content')

@section('navbar')
    @parent
@endsection
<h1 id="">Ludotheque</h1>
<h2>Liste des jeux</h2>
@auth
    <a href="{{route('ludotheque/create')}}"><button type="input" class="btn btn-primary">
            Ajouter un jeu
        </button></a>
@endauth
<br>
<br>
<div>
    <h4>Filtrage par âge</h4>
    <form action="{{route('ludotheque/index')}}" method="get">
        <select name="cat">
            <option value="All" @if($cat == 'All') selected @endif></option>
            @foreach($age_min as $m)
                <option value="{{$m}}"  @if($cat == $m) selected @endif>{{$m}}</option>
            @endforeach
        </select>
        <input type="submit" value="OK">
    </form>
</div>
<br>

<table>
    <tr id="info">
        <td class="m">img</td>
        <td class="m">NOM</td>
        <td class="m">ANNEE DE SORTIE</td>
        <td class="m">AGE MIN</td>
        <td class="m">MIN-MAX JOUEUR</td>
        <td class="m">MIN-MAX DUREE</td>
        <td class="g">DESCRIPTION</td>
        <td class="m">Action</td>
    </tr>

@if(!empty($jeux))

        @foreach($jeux as $j)
            <tr>
                <td><img src="{{asset($j->img)}}" style="width: 125px; height: 125px;"></td>
                <td> {{$j->nom}}</td>
                <td>{{$j->annee_sortie}}</td>
                <td>{{$j->age_min}}</td>
                <td>{{$j->min_max_joueur}}</td>
                <td>{{$j->min_max_duree}}</td>
                <td>{{$j->description}}</td>
                <td>
                    <a href="{{route('ludotheque/create')}}"></a>
                    <a href="{{route('ludotheque/show',$j->id)}}?action=show"><button type="input" class="btn btn-primary">
                            Afficher
                        </button></a>
                    @can('update', $j)
                    <a href="{{route('ludotheque/edit',$j->id)}}"><button type="input" class="btn btn-primary">
                            Modifier
                        </button></a>
                    @endcan
                    @can('delete', $j)
                    <a href="{{route('ludotheque/show',$j->id)}}?action=delete"><button type="input" class="btn btn-primary">
                            Supprimer
                        </button></a>
                    @endcan
                </td>
            </tr>

        @endforeach
    </table>
@else
    <h3>aucun jeux</h3>
@endif
@endsection
</body>
</html>
<!--
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
php artisan optimize
-->
