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
        Schema::create('historiques', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('clients_id');
            $table->string('clients_nom_email_tel');
            $table->bigInteger('commandes_id');
            $table->string('commandes_date');
            $table->text('produits_nom');      // Stocker plusieurs noms de produits
            $table->text('produits_prix');     // Stocker plusieurs prix de produits
            $table->text('produits_quantite'); // Stocker plusieurs quantités de produits
            $table->decimal('montant_total', 10, 2);
            $table->unique(['clients_id', 'commandes_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historiques');
    }
};
