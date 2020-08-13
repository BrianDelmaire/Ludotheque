<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    protected $table = "commentaires";

    function jeux(){
        return $this->belongsTo(Jeu::class);
    }
}
