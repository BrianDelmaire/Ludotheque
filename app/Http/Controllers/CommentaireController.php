<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Jeu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentaireController extends Controller
{
    public function index(){
        $commentaire = Commentaire::where('auteur', Auth::user()->name)->get();
        $jeu = Jeu::all();
        return view('commentaire.index', ['commentaire' => $commentaire,'jeu'=>$jeu]);
    }

    public function store(Request $request)
    {
        $jeu_id = $request->jeu_id;

        $this->validate(
            $request,
            [
                'titre'=> 'required',
                'body'=> 'required',
                'auteur'=> 'required',
                'jeu_id'=> 'required'
            ]
        );

        $commentaire = new Commentaire();
        $commentaire->titre = $request->titre;
        $commentaire->body = $request->body;
        $commentaire->auteur = $request->auteur;
        $commentaire->jeu_id = $request->jeu_id;

        $commentaire->save();

        return redirect()->route('ludotheque/show', $jeu_id);

    }

    public function update(Request $request, $id){
        //$jeu_id = $request->jeu_id;
        $commentaire = Commentaire::find($id);
        //$this->authorize('update', $commentaire);
        $this->validate(
            $request,
            [
                'titre'=> 'required',
                'body'=> 'required',
                'auteur'=> 'required',
                'jeu_id'=> 'required'

            ]
        );
        $commentaire->titre = $request->titre;
        $commentaire->body = $request->body;
        $commentaire->auteur = $request->auteur;
        $commentaire->jeu_id = $request->jeu_id;

        $commentaire->save();

        return redirect()->route('ludotheque/show', $commentaire->jeu_id);
    }

    public function create(Request $request){
        $jeu_id = $request->jeu_id;
        return view('commentaire.create', ['jeu_id'=> $jeu_id]);

    }
    public function edit(Request $request, $id)
    {
        $jeu_id = $request->jeu_id;

        $commentaire = Commentaire::find($id);
        return view('commentaire.edit', ['jeu_id'=>$jeu_id, 'commentaire'=>$commentaire]);
    }

    public function destroy(Request $request,$id)
    {
        if($request->delete == 'valide'){
            $commentaire = Commentaire::findOrFail($id);
            $commentaire->delete();
        }
        return redirect()->route('ludotheque/show', $commentaire->jeu_id);
    }

}
