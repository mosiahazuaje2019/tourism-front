<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('pax', 7);
            $table->enum('service', ['LLegada', 'Salida', 'Traslado']);
            $table->string('client_name', 120)->nullable();
            $table->string('hotel', 200)->nullable();
            $table->string('flight', 40)->nullable();
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->string('comments', 250)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
