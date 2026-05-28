<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('solicitud_detalle', function (Blueprint $table) {

            $table->id();

            $table->foreignId('solicitud_id')
                  ->constrained('solicitudes')
                  ->onDelete('cascade');

            $table->foreignId('examen_id')
                  ->constrained('examenes')
                  ->onDelete('cascade');

            $table->decimal('precio', 10, 2);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('solicitud_detalle');
    }
};