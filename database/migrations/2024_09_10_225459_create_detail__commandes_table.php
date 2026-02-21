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
        Schema::create('detail__commandes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('commandes_id')
            ->constrained()
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreignId('produits_id')
            ->constrained()
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->integer('quantite_commande');
            $table->timestamps();

            $table->unique(['commandes_id', 'produits_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail__commandes');
    }
};
