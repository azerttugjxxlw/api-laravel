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

        Schema::create('myrecap', function (Blueprint $table) {
            $table->string('CodePdt'); // CodeClient est une clé primaire et un string
            $table->string('PvteUnit'); // Raison Sociale
            $table->float('CodeCateg'); // Prix client
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('myrecap');
    }
};
