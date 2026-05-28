<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('parametros_examen', function (Blueprint $table) {

            $table->id();

            $table->foreignId('examen_id')
                  ->constrained('examenes')
                  ->onDelete('cascade');

            $table->string('nombre');

            $table->string('unidad_medida')->nullable();

            $table->string('valor_referencia')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('parametros_examen');
    }
};