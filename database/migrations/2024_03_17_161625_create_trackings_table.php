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
        Schema::create('trackings', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_seguimiento');
            $table->string('observaciones', 255);
            $table->string('pdf_seguimiento', 50)->nullable();
            $table->unsignedBigInteger('tutor_id');
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('student_id');

            // Definición de las claves foráneas
            $table->foreign('tutor_id')->references('id')->on('tutors')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('type_id')->references('id')->on('typesTrackings')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trackings');
    }
};
