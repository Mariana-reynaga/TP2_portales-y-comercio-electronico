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
            $table->unsignedTinyInteger('material_fk');
            $table->foreign('material_fk')->references('material_id')->on('materials');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lamparas', function (Blueprint $table) {
            $table->dropColumn('material_fk');
        });
    }
};
