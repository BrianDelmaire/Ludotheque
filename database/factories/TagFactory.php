<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Tag;
use Faker\Generator as Faker;

$factory->define(Tag::class, function (Faker $faker) {
    return [
        'label' => $faker->randomElement($array = array('action','famille','adulte','course','rigolo')),
        'jeu_id' => $faker->randomElement($array = array(5,6,7,8))
    ];
});
