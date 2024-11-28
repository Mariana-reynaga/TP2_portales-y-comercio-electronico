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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id('sale_id');

            $table->unsignedBigInteger('user_fk');
            $table->foreign('user_fk')->references('user_id')->on('users');

            $table->unsignedBigInteger('product_fk');
            $table->foreign('product_fk')->references('lamp_id')->on('lamparas');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
