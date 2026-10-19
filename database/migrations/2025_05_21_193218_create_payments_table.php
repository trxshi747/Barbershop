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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')
                  ->constrained('bookings')
                  ->onDelete('cascade'); // Clé étrangère vers bookings
            $table->string('payment_id');
            $table->decimal('montant', 10, 2); // 99999999.99 DH max
            $table->string('methode', 50); // PayPal, Espèces, Carte...
            $table->dateTime('date_paiement');
            $table->timestamps();
        });
    }

    protected $casts = [
        'date_paiement' => 'datetime:Y-m-d H:i:s',
    ];

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
