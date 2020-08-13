<?php

use App\Models\Commentaire;
use Illuminate\Database\Seeder;

class CommentaireTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Commentaire::class,10)->create();
    }
}
