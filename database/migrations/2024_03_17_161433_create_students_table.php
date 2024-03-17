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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 60);
            $table->string('apellidos', 100);
            $table->string('email', 100);
            $table->string('telefono_movil');
            $table->string('subir_cv', 50)->nullable();
            $table->date('fecha_inicio_fct')->nullable();
            $table->date('fecha_fin_fct')->nullable();
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('companie_id');
            // $table->unsignedBigInteger('tfg_id');
            // $table->unsignedBigInteger('tracking_id');

            // Definición de las claves foráneas
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('companie_id')->references('id')->on('companies')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('tfg_id')->references('id')->on('tfgs')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('tracking_id')->references('id')->on('trackings')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
