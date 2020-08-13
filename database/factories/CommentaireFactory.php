<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Commentaire;
use Faker\Generator as Faker;

$factory->define(Commentaire::class, function (Faker $faker) {
    return [
        'titre' => $faker->randomElement($array = array('Cool','décevant','bof','5 etoiles','trop bien')),
        'body' => $faker->randomElement($array = array('Meilleur jeux du monde c trop bien','bofdvzbvlraevi jai pas aimé')),
        'auteur'=> $faker->randomElement($array = array('Antoine','Michel','Bruno','Camilien')),
        'jeu_id' => $faker->randomElement($array = array(5,6,7,8))
    ];
});
