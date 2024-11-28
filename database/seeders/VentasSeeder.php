<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class VentasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ventas')->insert([
            [
                'user_fk'       => 2,
                'product_fk'    => 1,
                'created_at'    => '2024-11-26 23:35:44'
            ],
            [
                'user_fk'       => 2,
                'product_fk'    => 5,
                'created_at'    => '2024-11-26 23:35:44'
            ],
            [
                'user_fk'       => 2,
                'product_fk'    => 3,
                'created_at'    => '2024-11-26 23:35:44'
            ],
            
            [
                'user_fk'       => 2,
                'product_fk'    => 3,
                'created_at'    => '2024-11-26 23:36:44'
            ],

            [
                'user_fk'       => 2,
                'product_fk'    => 3,
                'created_at'    => '2024-11-28 23:35:44'
            ],
            [
                'user_fk'       => 2,
                'product_fk'    => 3,
                'created_at'    => '2024-11-28 23:35:44'
            ],
        ]);
    }
}
