<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Database\Seeders\CourseSeeder;
use Illuminate\Support\Facades\Artisan;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50)->default('Curso de prueba');
            $table->timestamps();
        });

         // Llama al seeder después de crear la tabla
            Artisan::call('db:seed', [
                '--class' => CourseSeeder::class
            ]);



    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
