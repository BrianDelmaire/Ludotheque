<?php

namespace App\Providers;

use App\Models\Commentaire;
use App\Models\Jeu;
use App\Policies\CommentairePolicy;
use App\Policies\LudothequePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        Jeu::class =>LudothequePolicy::class,
        Commentaire::class => CommentairePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('update-jeu', function ($user, $suivi) {
            return $user->id === $suivi->auteur_id;
        });

        //autorise la modification d’un suivi d’exécution uniquement si l’utilisateur connecté et celui qui a crée le suivi d’exécution.
    }
}
