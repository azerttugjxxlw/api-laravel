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
        Schema::create('mysortiestocks', function (Blueprint $table) {
            $table->string('RefSortie')->primary(); // RefSortie is the primary key and a string
            $table->date('DateSortie'); // DateSortie is a date field
            $table->integer('QteSortie'); // QteSortie is an integer
            $table->string('SortieEtat'); // SortieEtat is a string (can represent state or status)
            $table->string('MotifSortie'); // MotifSortie is a string (can represent the reason for the exit)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mysortiestocks');
    }
};
