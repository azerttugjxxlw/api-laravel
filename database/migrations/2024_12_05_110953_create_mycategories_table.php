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
        Schema::create('mycategorie', function (Blueprint $table) {

            $table->string('DesignCateg')->primary(); // CodeClient est une clé primaire et un string
            $table->string('LettreCle'); // Raison Sociale
            $table->integer('Nb_Bout'); // Prix client
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mycategorie');
    }
};
