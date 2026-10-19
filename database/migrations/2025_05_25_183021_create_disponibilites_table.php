<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisponibilitesTable extends Migration
{
    public function up()
    {
        Schema::create('disponibilites', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('coiffeur_id');
            $table->date('date');
            $table->time('heure_debut');
            $table->time('heure_fin');
            $table->string('statut')->default('disponible');
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('coiffeur_id')
                  ->references('id')
                  ->on('Coiffeurs')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('disponibilites');
    }
}