<?php

namespace App\Policies;

use App\Models\Commentaire;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentairePolicy
{
    function update(User $user, Commentaire $c) {
        return $user->name === $c->auteur;
    }

    function delete(User $user, Commentaire $c) {
        return $user->name === $c->auteur;
    }

}
