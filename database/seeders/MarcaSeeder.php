<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('marcas')->insert([
            [
                'brand_name' => 'TBCin',
                'created_at' => now()
            ],
            [
                'brand_name' => 'Luz Desing Iluminación',
                'created_at' => now()
            ],
            [
                'brand_name' => 'Luz Desing',
                'created_at' => now()
            ],
        ]);
    }
}
