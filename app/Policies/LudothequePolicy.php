<?php

namespace App\Policies;

use App\Models\Jeu;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LudothequePolicy
{
    function update(User $user, Jeu $suivi) {
        return $user->id === $suivi->auteur_id;
    }

    function delete(User $user, Jeu $suivi) {
        return $user->id === $suivi->auteur_id;
    }

    function create(User $user) {
        return true;
    }
}
