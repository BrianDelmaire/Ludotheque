@extends("layout.master")

<!DOCTYPE html>

<html>
<head>
    <title>Afficher - Jeu</title>
    <link rel="icon" href="">
    <link rel="stylesheet" href="{{ asset('css/styleLudotheque.css') }}">

</head>


<body>

@section('navbar')
    @parent
@endsection


@section('content')

<div class="text-center" style="margin-top: 2rem">
    @if($action == 'delete')
        <h3 style="margin-top: 100px">Suppression d'un jeu</h3>
    @else
        <h3 style="margin-top: 100px">Affichage d'un jeu</h3>
    @endif
    <hr class="mt-2 mb-2">
</div>

<div>
    <img src="{{asset($jeu->img)}}" style="height: 150px; width: 150px;">
</div>
<div>
    <p><strong>nom : </strong>{{$jeu->nom}}</p>
</div>
<div>
    <p><strong>Annee de sortie :  </strong>{{$jeu->annee_sortie}}</p>
</div>
<div>
    <p><strong>Age min  : </strong>{{$jeu->age_min}}</p>
</div>
<div>
    <p><strong>Min max Joueur  : </strong>{{$jeu->min_max_joueur}}</p>
</div>
<div>
    <p><strong>Min-max-duree  : </strong>{{$jeu->min_max_duree}}</p>
</div>
<div>
    <p><strong>Description :</strong>{{ $jeu->description}}</p>
</div>
@if($action == 'show')
    @auth
        <a href="{{route('commentaire/create',['jeu_id'=>$jeu->id])}}"><button type="input" class="btn btn-primary">
                Ajouter commentaire
            </button></a>
        <br>
    @endauth
    <br>
<table>
    <tr id="info">
        <td class="m">TITRE</td>
        <td class="m">BODY</td>
        <td class="m">AUTEUR</td>
        <td class="m">ACTION</td>
    </tr>


    @foreach($commentaire as $c)
            <tr>
                <td>{{$c->titre}}</td>
                <td>{{$c->body}}</td>
                <td>{{$c->auteur}}</td>
                @can('update', $c)
                <td><a href="{{route('commentaire/edit',$c->id)}}"><button type="input" class="btn btn-primary">
                            Modifier
                        </button></a></td>
                @endcan
                    @cannot('update',$c)
                        <td><p>Vous n'avez pas les droits</p></td>
                    @endcannot
            </tr>

        @endforeach
</table>
<br>

    <h6><strong class="">Tags : </strong></h6>
    <br>
@if(!empty($jeu->tag))
    @foreach($jeu->tag as $t)
        <form action="{{route('tag/store')}}" method="POST" style="color: rgb(230, 230, 230); display: inline">
            {!! csrf_field() !!}
            <input type="hidden" id="jeu_id" name="jeu_id" value="{{$jeu->id}}" readonly="readonly">
            <input type="hidden" id="tag_id" name="tag_id" value="{{$t->id}}" readonly="readonly">
            <button class="btn btn-dark btn-sm mr-1">
                @auth
                <input type="hidden" id="action" name="action" value="dissociate">
                @endauth
                <i class="fas fa-tag"></i> {{$t->label}} <i class="fas fa-times-circle ml-1" title="Supprimer tag"></i>
            </button>
        </form>
    @endforeach
@endif
<form action="{{route('tag/store')}}" method="POST" class="ml-1">
    {!! csrf_field() !!}
    @auth
    <input type="hidden" id="action" name="action" value="associate">
    <br>
    <select class="btn btn-dark btn-sm" name="tag_id">
        <option value="">-- Nouveau tag --</option>
        @foreach($tags as $t)
            @if (!\App\Http\Controllers\TagController::tagInJeu($jeu->id, $t->id))
                <option value="{{$t->id}}">{{$t->label}}</option>
            @endif
        @endforeach
    </select>

    <input type="hidden" id="jeu_id" name="jeu_id" value="{{$jeu->id}}" readonly="readonly">
    <button type="submit" class="btn btn-dark" title="Ajouter le tag">add</button>
        @endauth
</form>
</p>

<br>

{{--<a href="{{route('tag/create',['jeu_id'=>$jeu->id])}}">Ajouter tag</a>--}}

@endif
<br>


@if($action == 'delete')
@if(Auth::id() == $jeu->auteur_id)
    <form action="{{route('ludotheque/destroy',$jeu->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <div class="text-center">
            <p>Voulez-vous supprimer définitvement : {{$jeu->nom}}</p>
            <button type="submit" name="delete" value="valide">Valide</button>
            <button type="submit" name="delete" value="annule">Annule</button>
        </div>
    </form>

@else
    <br>
    <h1>Vous n'avez pas les droits</h1>
    <div>
        <a href="{{route('ludotheque/index')}}">Retour à la ludothéque</a>

    </div>

@endif
@endif
@endsection
</body>
</html>
