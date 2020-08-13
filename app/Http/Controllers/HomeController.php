<?php

namespace App\Http\Controllers;

use App\Models\Jeu;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home/index');
    }
    public function contact(){
        return view('home/contact');
    }

    public function about(){
        return view('home/about');


    }
    public function show()
    {
        //$id = Auth::user()->id;
        //$jeux = Jeu::where('auteur_id')->pluck($id);
        //return view('home.show', ['jeux'=>$jeux]);
    }
}
