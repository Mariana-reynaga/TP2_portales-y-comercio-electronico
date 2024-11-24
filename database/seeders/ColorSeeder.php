<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('colors')->insert([
            [
                'color_name' => 'Dorado',
                'created_at' => now()
            ],
            [
                'color_name' => 'Plateado',
                'created_at' => now()
            ],
            [
                'color_name' => 'Negro',
                'created_at' => now()
            ],
            [
                'color_name' => 'Blanco',
                'created_at' => now()
            ]
        ]);
    }
}
