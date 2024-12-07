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
        Schema::create('mystocks', function (Blueprint $table) {
            $table->string('idStock')->primary(); // idStock est une clé primaire et un string
            $table->integer('QteStock'); // QteStock est un entier
            $table->date('DateMotif'); // DateMotif est une date
            $table->integer('TransFApp'); // TransFApp est une chaîne de caractères
            $table->timestamps(); // Ajoute les champs created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mystocks');
    }
};
