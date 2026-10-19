<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            
            // Clé étrangère pour l'utilisateur
            $table->foreignId('user_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->date('date');
            $table->time('time');
            $table->unsignedInteger('duration'); // Durée en minutes
            $table->decimal('price', 8, 2); // 999999.99 DH max
            $table->foreignId('coiffeur_id')->nullable()->constrained('coiffeurs');
            $table->timestamps(); 
            
        });

    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
        Schema::ropForeign(['coiffeur_id']);
        Schema::dropColumn('coiffeur_id');
    }
};
