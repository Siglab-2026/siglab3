<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('resultados', function (Blueprint $table) {

            $table->id();

            $table->foreignId('solicitud_detalle_id')
                  ->constrained('solicitud_detalle')
                  ->onDelete('cascade');

            $table->foreignId('parametro_examen_id')
                  ->constrained('parametros_examen')
                  ->onDelete('cascade');

            $table->string('resultado')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('resultados');
    }
};