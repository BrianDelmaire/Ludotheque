@extends("layout.master")
<!DOCTYPE html>
<html>
<head>
    <title>Liste - Commentaire</title>
    <link rel="stylesheet" href="{{ asset('css/styleLudotheque.css') }}">
    <link rel="icon" href="">
</head>


<body>

@section('navbar')
    @parent
@endsection

@section('content')
<h1 style="margin-top: 100px">Mes Commentaires</h1>


<table>
    <tr id="info">
        <td class="m">TITRE</td>
        <td class="m">BODY</td>
        <td class="m">FCT</td>
    </tr>

@foreach($commentaire as $c)
        <tr>
            <td> {{$c->titre}}</td>
            <td> {{$c->body}}</td>
            <td><a href="{{route('ludotheque/show',$c->jeu_id)}}?action=show"><button type="input" class="btn btn-primary">
                        Afficher
                    </button></a></td>
{{--            <td>{{$jeu[$c->jeu_id]['nom']}}</td>--}}
        </tr>

    @endforeach

</table>
    @endsection
</body>
</html>
