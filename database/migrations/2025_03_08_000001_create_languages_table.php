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
        Schema::create('languages', function (Blueprint $table) {
            $table->string('id', 3)->primary();  // 'id' es el código ISO 639-3, clave primaria
            $table->string('name')->unique();    // 'name' es el nombre del idioma en inglés
            $table->string('nombre')->unique();  // 'nombre' es el nombre del idioma en español
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('languages');
    }
};
