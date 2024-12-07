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
        Schema::create('myvportes', function (Blueprint $table) {
            $table->string('CodeVporte')->primary(); // CodeVporte est la clé primaire et un string
            $table->string('NomPrenom'); // NomPrenom
            $table->string('ContactVprote'); // ContactVprote
            $table->string('Numpiece'); // Numpiece
            $table->string('NomPrenomCaution'); // NomPrenomCaution
            $table->string('ContactCaution'); // ContactCaution
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('myvportes');
    }
};
