<?php

namespace App\Http\Controllers;

use App\Models\Jeu;
use App\Models\JeuTag;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(Request $request)
    {
        $cat = $request->query('cat', 'All');
        if ($cat != 'All') {
            $tag = Tag::where('label', $cat)->get();
        } else {
            $tag = Tag::all();
        }
        $label = Tag::distinct('label')->pluck('label');

        return view('tag/index', ['tag' => $tag,'cat' => $cat, 'label' => $label]);
    }

    public function newLabel(Request $request){

        $jeu_id = $request->jeu_id;

        $this->validate(
            $request,
            [
                'label' => 'required',
                'jeu_id'=> 'required'

            ]
        );

        $tag = new Tag();

        $tag->label = $request->label;
        $tag->jeu_id = $request->jeu_id;

        $tag->save();

        return redirect()->route('ludotheque/show', $jeu_id);
    }

    public function store(Request $request) {

        if ($request->action == 'associate') {
            // validation des données de la requête
            $this->validate(
                $request,
                [
                    'jeu_id' => 'required',
                    'tag_id' => 'required'
                ]
            );
            $tag = Tag::find($request->tag_id);
            $tag->jeux()->attach($request->jeu_id);
        }
        elseif ($request->action == 'dissociate') {
            // validation des données de la requête
            $this->validate(
                $request,
                [
                    'jeu_id' => 'required',
                    'tag_id' => 'required'
                ]
            );
            $tag = Tag::find($request->tag_id);
            $tag->jeux()->detach($request->jeu_id);
        }
        return back();
    }

    public function create(Request $request){
        return view('tag/create');

    }

    public static function tagInJeu($jeu_id, $tag_id){
        $tagsInJeu = Jeu::findOrFail($jeu_id)->tag;
        $idTags = [];
        foreach ($tagsInJeu as $tags){
            $idTags[] = $tags->id;
        }
        return in_array($tag_id, $idTags);
    }


}
