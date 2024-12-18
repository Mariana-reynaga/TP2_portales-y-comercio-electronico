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
        Schema::create('lamparas', function (Blueprint $table) {
            $table->bigIncrements('lamp_id');
            $table->string('lamp_name');
            $table->unsignedInteger('lamp_price');
            $table->unsignedSmallInteger('lamp_height');
            $table->unsignedSmallInteger('lamp_stock');
            $table->string('lamp_image')->nullable();
            $table->string('lamp_image_alt')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lamparas');
    }
};
