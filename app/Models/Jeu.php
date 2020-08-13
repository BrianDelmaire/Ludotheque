<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jeu extends Model
{
    protected $table = "jeux";

    function commentaire(){
        return $this->hasMany(Commentaire::class);
    }

    function tag(){
        return $this->belongsToMany(Tag::class);
    }

}
