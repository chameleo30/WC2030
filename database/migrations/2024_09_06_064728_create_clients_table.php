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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 50);
            $table->string('prenom', 50);
            $table->date('date_naissance');
            $table->enum('sexe', ['Homme', 'Femme']);
            $table->string('tel', 20)->unique();
            $table->string('adresse', 255);
            $table->string('ville', 50);
            $table->string('email', 255)->unique();
            $table->string('mot_de_passe', 255)->unique();
            $table->string('photo', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
