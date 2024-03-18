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
        Schema::table('students', function (Blueprint $table) {
            //
            $table->foreign('tfg_id')->references('id')->on('tfgs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tracking_id')->references('id')->on('trackings')->onDelete('cascade')->onUpdate('cascade');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            //
            $table->dropForeign(['tracking_id']);
            $table->dropForeign(['tfg_id']);


        });
    }
};
