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
            $table->string('name', 60);
            $table->string('apellidos', 100)->default('');
            $table->string('email', 100);
            $table->string('telefono_movil')->default('');
            $table->float('nota_media')->nullable();
            $table->string('subir_cv', 255)->nullable();
            $table->date('fecha_inicio_fct')->nullable();
            $table->date('fecha_fin_fct')->nullable();
            $table->string('direccion_practicas', 100)->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('tutor_id')->nullable();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('course_id')->nullable();
        
            // Definición de las claves foráneas
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tutor_id')->references('id')->on('tutors')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('set null')->onUpdate('cascade'); // Cambia esto a 'set null'
        
            $table->timestamps();
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
