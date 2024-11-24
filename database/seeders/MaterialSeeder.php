<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('materials')->insert([
            [
                'material_name' => 'Acero',
                'created_at'    => now()
            ],
            [
                'material_name' => 'Plastico',
                'created_at'    => now()
            ],
            [
                'material_name' => 'Acero Inoxidable',
                'created_at'    => now()
            ],
            [
                'material_name' => 'Aluminio',
                'created_at'    => now()
            ],
        ]);
    }
}
