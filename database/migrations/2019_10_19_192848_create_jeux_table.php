<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJeuxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jeux', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('img');
            $table->string('nom');
            $table->integer('annee_sortie');
            $table->integer('age_min');
            $table->string('min_max_joueur');
            $table->string('min_max_duree');
            $table->text('description');
            $table->bigInteger('auteur_id')->unsigned();
            $table->foreign('auteur_id')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jeux');
    }
}
