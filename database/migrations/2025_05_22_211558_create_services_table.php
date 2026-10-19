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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200); // varchar(200)
            $table->text('description'); // text
            $table->string('image', 200); // varchar(200)
            $table->float('price', 8, 2); // float
            $table->integer('duration'); // int(11)
            $table->string('section', 200); // varchar(200)
            $table->timestamps(); // created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
