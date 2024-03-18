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
        Schema::table('tfgs', function (Blueprint $table) {
            //
            $table->foreign('tutor_id')->references('id')->on('tutors');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tfgs', function (Blueprint $table) {
            //
            $table->dropForeign(['tutor_id']);
        });
    }
};
