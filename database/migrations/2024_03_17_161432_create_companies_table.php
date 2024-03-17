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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 60);
            $table->string('direccion', 255)->nullable();
            $table->string('codigo_postal', 5)->nullable();
            $table->string('municipio', 100);
            $table->string('localidad', 100);
            $table->string('provincia', 100);
            $table->string('web', 255)->nullable();
            $table->string('nombre_contacto', 60);
            $table->string('apellido_contacto', 100);
            $table->string('email_contacto', 100);
            $table->string('telefono_fijo')->nullable();
            $table->string('telefono_movil');
            $table->date('fecha_ultimo_contacto')->nullable();
            $table->integer('plazas_disponibles');
            $table->string('observaciones', 255)->nullable();
            $table->unsignedBigInteger('student_id')->nullable();
            $table->unsignedBigInteger('course_id')->nullable();

            // Definición de las claves foráneas
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
