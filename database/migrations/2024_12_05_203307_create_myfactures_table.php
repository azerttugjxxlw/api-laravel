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
        Schema::create('myfacturem', function (Blueprint $table) {
            $table->string('idFacture')->primary(); // idFacture est une clé primaire
            $table->string('NumFacture'); // Numéro de la facture
            $table->integer('NbPdt'); // Nombre de produits
            $table->double('MontFacture'); // Montant total de la facture
            $table->date('Date'); // Date de la facture
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('myfacturem');
    }
};
