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
        Schema::create('mypaniers', function (Blueprint $table) {
            $table->string('idPanier')->primary(); // idPanier est une clé primaire et un string
            $table->string('Client'); // Client
            $table->string('NomProduit'); // Nom du produit
            $table->string('CategProd'); // Catégorie du produit
            $table->double('PrixUnitaire'); // Prix unitaire avec 2 décimales
            $table->integer('QteProduit'); // Quantité du produit
            $table->double('PrixTotal'); // Prix total avec 2 décimales
            $table->date('Date'); // Date et heure de l'ajout au panier
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mypaniers');
    }
};
