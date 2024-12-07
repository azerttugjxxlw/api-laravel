<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Exécuter la migration.
     */
    public function up(): void
    {
        Schema::create('myuser', function (Blueprint $table) {
            $table->id();
            $table->string('role');
            $table->string('name')->unique();  // Le champ 'name' est maintenant unique
            $table->string('password');  // Conserver seulement le champ 'password'
            $table->timestamps();
        });
    }


    /**
     * Inverser la migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('myuser');
    }
};
