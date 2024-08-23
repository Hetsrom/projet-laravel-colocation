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
        Schema::create('avis', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id'); // Clé étrangère vers 'users'
             $table->unsignedBigInteger('offres_id'); // Clé étrangère vers 'listings'
            $table->tinyInteger('rating'); // Note de 1 à 5
             $table->text('comment');
            $table->timestamps();



            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
             $table->foreign('offres_id')->references('id')->on('offres')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avis');
    }
};
