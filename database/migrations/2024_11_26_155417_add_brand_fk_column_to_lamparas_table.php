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
            $table->unsignedTinyInteger('brand_fk');
            $table->foreign('brand_fk')->references('brand_id')->on('marcas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lamparas', function (Blueprint $table) {
            $table->dropColumn('brand_fk');
        });
    }
};
