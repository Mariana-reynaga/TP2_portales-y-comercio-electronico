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
        Schema::table('lamparas', function (Blueprint $table) {
            $table->unsignedTinyInteger('color_fk');
            $table->foreign('color_fk')->references('color_id')->on('colors');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lamparas', function (Blueprint $table) {
            $table->dropColumn('color_fk');
        });
    }
};
