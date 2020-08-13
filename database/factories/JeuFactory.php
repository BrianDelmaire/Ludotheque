<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Jeu;
use Faker\Generator as Faker;

$factory->define(Jeu::class, function (Faker $faker) {
    return [
        'nom' => $faker->randomElement($array = array('Monopoly','Bonne paie','uno','Poker','Scrabble','Puissance 4','Twister')),
        'img' => $faker->randomElement($array = array('https://fac.img.pmdstatic.net/fit/http.3A.2F.2Fprd2-bone-image.2Es3-website-eu-west-1.2Eamazonaws.2Ecom.2Ffac.2F2020.2F03.2F23.2Fb3f0af76-0acf-41a4-a3e1-5444b26f8102.2Ejpeg/850x478/quality/90/crop-from/center/voici-les-meilleurs-jeux-de-societe-gratuits-pour-mieux-vivre-le-confinement.jpeg','https://lh3.googleusercontent.com/proxy/-s5-ibwVvSnXyzVZueTj3YV5F2PSLQ_rY7wohr1ublhAOvQ4KXFbonlFI_UVuUxRs8EErDZtNmo_aWL2EdKzzaJ3','https://img.src.ca/2012/05/04/635x357/120504_il5ei_jeux_societe_sn635.jpg')),
        'annee_sortie' => $faker->numberBetween($min = 1990, $max=2019),
        'age_min'=> $faker->randomElement($array = array(3,7,12,16,18)),
        'min_max_joueur'=>$faker->randomElement($array = array('2 à 12 joueurs','2 à 6 joueurs','4 à 6 joueurs','2 à 6 joueurs',)),
        'min_max_duree'=>$faker->randomElement($array = array('30 min à 1h','15 min à 30 min',' 1h30 à 2h15',' 10 min à 20 min',)),
        'description'=>$faker->randomElement($array = array(
            'Le Monopoly est un jeu de société sur parcours dont le but est, à travers l\'achat et la vente de propriétés, de ruiner ses adversaires et ainsi parvenir au monopole.',
            ' un jeu qui allie la stratégie d\'un bon jeu de société, à la gymnastique ! Pour gagner il vous suffira de rester debout le dernier',
            'Pour gagner une partie de puissance 4, il suffit d\'être le premier à aligner 4 jetons de sa couleur horizontalement, verticalement et diagonalement. Si lors d\'une partie, tous les jetons sont joués sans qu\'il y est d\'alignement de jetons, la partie est déclaré nulle.',
            'Le but du jeu du Scrabble est d’avoir le plus de points en créant des mots à l’aide de lettres piochées au hasard.  En posant ceux-ci sur le plateau de Scrabble, le joueur obtient des points suivant la valeur des lettres et des cases sur lesquelles figure le mot.',)),
    ];
});
