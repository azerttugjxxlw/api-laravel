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
        Schema::create('myproduit', function (Blueprint $table) {

            $table->string('CodePdt')->primary(); // CodeClient est une clé primaire et un string
            $table->string('DesignPdt'); // Désignation du produit
            $table->double('QteStockAlerte'); // Quantité pour alerte
            $table->double('QteStockSec'); // Quantité de sécurité
            $table->date('DateMotif'); // Date (peut être nul)
            $table->string('CodeFournis'); // Code fournisseur
            $table->integer('PvteCas'); // Prix de vente
            $table->string('TypePdt'); // Type de produit
            $table->integer('PdtTVA'); // TVA du produit
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('myproduit');
    }
};
