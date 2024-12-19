<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('orders')->insert([
            [
                'order_id' => 12,
                'reciever_name' => 'Mariana Reynaga',
                'order_adress' => 'Torcuarto Basil 2568',
                'order_postal_code' => 1235,
                'order_notes' => null,
                'price_total' => '262.000,00',
                'order_status' => 'Completo',
                'user_id_fk' => 2,
                'created_at'    => now()
            ],
            [
                'order_id' => 13,
                'reciever_name' => 'Amiguito Tony',
                'order_adress' => 'Av Miguel angel 488 6B',
                'order_postal_code' => 2658,
                'order_notes' => 'Porfavor preparar el pedido como regalo!',
                'price_total' => '150.000,00',
                'order_status' => 'En proceso',
                'user_id_fk' => 2,
                'created_at'    => now()
            ],

        ]);
    }
}
