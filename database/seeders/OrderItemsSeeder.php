<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('order_items')->insert([
            [
                'order_items_price' => 4000,
                'order_items_qnty' => 1,
                'order_id_fk' => 12,
                'product_id_fk' => 1,
                'created_at'    => now()
            ],
            [
                'order_items_price' => 86000,
                'order_items_qnty' => 3,
                'order_id_fk' => 12,
                'product_id_fk' => 3,
                'created_at'    => now()
            ],
            [
                'order_items_price' => 150000,
                'order_items_qnty' => 1,
                'order_id_fk' => 13,
                'product_id_fk' => 2,
                'created_at'    => now()
            ],

        ]);
    }
}
