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
        Schema::create('piezas', function (Blueprint $table) {
            $table->id();
            $table->string('idpieza')->unique();
            $table->string('nombrepieza');
            $table->string('pesoteorico')->nullable();
            $table->string('pesoreal')->nullable();
            $table->string('estado');

            $table->unsignedBigInteger('bloque_id');
            $table->foreign('bloque_id')->references('id')->on('bloques')->onDelete('cascade');

            $table->unsignedBigInteger('proyecto_id');
            $table->foreign('proyecto_id')->references('id')->on('proyectos')->onDelete('cascade');

            $table->string('registrado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('piezas');
    }
};
