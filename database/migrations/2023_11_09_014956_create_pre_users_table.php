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
        Schema::create('pre_users', function (Blueprint $table) {
            $table->id();
            $table->string('company_name',120)->nullable(false);
            $table->string('name',120)->nullable(false);
            $table->string('phone',20)->nullable(false);
            $table->string('email',60)->nullable(false);
            $table->string('password',60)->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pre_users');
    }
};
