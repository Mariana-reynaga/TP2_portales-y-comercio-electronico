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
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('order_id');
            $table->string('reciever_name');
            $table->string('order_adress');
            $table->smallInteger('order_postal_code');
            $table->tinyText('order_notes')->nullable();
            $table->string('price_total');
            $table->enum('order_status', ['En proceso', 'Completo', 'Cancelado', 'En camino'])->default('En proceso');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
