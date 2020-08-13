@extends("layout.master")


@section('title', 'Saisie d\'une personne')

@section('navbar')
    <h3 style="text-align: center; margin-top: 100px">Bienvenue dans la gestion des tâches</h3>
    @parent
@endsection
@section('content')
    <h2>Ajout d'un tag</h2>

    <form action="{{route('tag/newLabel')}}" method="POST">
        @csrf <!-- la directive ajoute un champ caché au formulaire qui permettra au serveur de vérifier que le formulaire a été envoyé par lui.-->
            {!! csrf_field() !!}

            <input type="hidden" value="{{2}}" name="jeu_id">
            <div>
                <label for="label"><strong>Label</strong></label>
                <input type="string"  name="label" placeholder="Ex : Action" >
            </div>
            <div>
                <button class="btn btn-success" type="submit">Valide</button>
            </div>
    </form>

@endsection
