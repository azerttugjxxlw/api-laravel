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
        Schema::create('myclient', function (Blueprint $table) {
            $table->string('CodeClient')->primary(); // CodeClient est une clé primaire et un string
            $table->string('Rais_Soc'); // Raison Sociale
            $table->string('CintactClient'); // Contact Client
            $table->string('AdrClient'); // Adresse Client
            $table->date('DateEnreg'); // Date d'enregistrement, optionnelle
            $table->string('TitreRep'); // Titre du représentant, optionnel
            $table->string('NomRep'); // Nom du représentant, optionnel
            $table->string('ContactRep'); // Contact du représentant, optionnel
            $table->string('PrixClient'); // Prix client
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('myclient');
    }
};
