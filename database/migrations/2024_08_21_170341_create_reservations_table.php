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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id'); // Clé étrangère vers 'users'
            $table->unsignedBigInteger('offre_id'); // Clé étrangère vers 'listings'
            $table->date('start_date');
            $table->date('end_date');
            $table->string('status')->default('pending'); // Status: pending, accepted, rejected
            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('offre_id')->references('id')->on('offres')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
