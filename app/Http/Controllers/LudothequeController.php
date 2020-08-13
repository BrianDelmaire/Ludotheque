<?php

namespace App\Http\Controllers;

use App\Models\Jeu;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LudothequeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function mesJeux(){
        if(Auth::id()){
            $jeux = Jeu::where('auteur_id',Auth::id())->get();
            return view('mesJeux', ['jeux' => $jeux]);
        }
    }

    public function index(Request $request)
    {
        $cat = $request->query('cat', 'All');
        if ($cat != 'All') {
            $jeux = Jeu::where('age_min', $cat)->get();
        } else {
            $jeux = Jeu::all();
        }
        $age_min = Jeu::distinct('age_min')->pluck('age_min');

        return view('index', ['jeux' => $jeux, 'cat' => $cat, 'age_min' => $age_min]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'img'=>'required',
                'nom'=> 'required',
                'annee_sortie'=> 'required',
                'age_min'=> 'required',
                'min_max_joueur'=> 'required',
                'min_max_duree'=> 'required',
                'description'=> 'required',
                'auteur_id' => 'required'
            ]
        );

        $jeu = new Jeu;
        $jeu->img=$request->img;
        $jeu->nom = $request->nom;
        $jeu->annee_sortie = $request->annee_sortie;
        $jeu->age_min = $request->age_min;
        $jeu->min_max_joueur = $request->min_max_joueur;
        $jeu->min_max_duree = $request->min_max_duree;
        $jeu->description = $request->description;
        $jeu->auteur_id = $request->auteur_id;

        $jeu->save();

        return redirect('ludotheque/index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $action = $request->query('action','show');
        $jeu = Jeu::find($id);
        $commentaire = Jeu::find($id)->commentaire()->get();
        $tag = Jeu::find($id)->tag()->get();
        $tags = Tag::all();

        return view('show', ['jeu' => $jeu,'action' => $action, 'commentaire' => $commentaire , 'tag' => $tag, 'tags' => $tags]);
        //http://127.0.0.1:8000/ludotheque/4
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jeu = Jeu::find($id);
        return view('edit', ['jeu'=>$jeu]);
        //http://127.0.0.1:8000/ludotheque/4/edit pour modif
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $jeu = Jeu::find($id);
        //$this->authorize('update', $jeu);
        $this->validate(
            $request,
            [
                'img'=>'required',
                'nom'=> 'required',
                'annee_sortie'=> 'required',
                'age_min'=> 'required',
                'min_max_joueur'=> 'required',
                'min_max_duree'=> 'required',
                'description'=> 'required',
                'auteur_id' => 'required'

            ]
        );
        $jeu->img = $request->img;
        $jeu->nom = $request->nom;
        $jeu->annee_sortie = $request->annee_sortie;
        $jeu->age_min = $request->age_min;
        $jeu->min_max_joueur = $request->min_max_joueur;
        $jeu->min_max_duree = $request->min_max_duree;
        $jeu->description = $request->description;
        $jeu->auteur_id = $request->auteur_id;

        $jeu->save();

        return redirect()->route('ludotheque/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $jeu = Jeu::find($id);
        $this->authorize('delete', $jeu);
        if($request->delete == 'valide'){

            $jeu->delete();
        }
        return redirect()->route('ludotheque/index');
    }
}
