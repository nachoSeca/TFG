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
        Schema::create('tfgs', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 60);
            $table->string('apellidos', 100);
            $table->string('email', 255);
            $table->string('telefono_movil')->nullable();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('tfg_id');
            $table->unsignedBigInteger('tracking_id');

            // Definición de las claves foráneas
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tfg_id')->references('id')->on('tfgs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tracking_id')->references('id')->on('trackings')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tfgs');
    }
};
