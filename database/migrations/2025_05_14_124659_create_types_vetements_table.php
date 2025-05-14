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
        Schema::create('types_vetements', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->foreignId('categorie_id')->constrained()->onDelete('cascade'); // Référence à la table "categories"
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('types_vetements');
    }
};
