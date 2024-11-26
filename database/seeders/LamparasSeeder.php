<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LamparasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('lamparas')->insert([
            [
                'lamp_name'         => 'Luz Tulipán',
                'lamp_price'        => '4000',
                'lamp_height'       => '12',
                'lamp_stock'        => '5',
                // 'image_fk'          => 1,
                'brand_fk'          => 1,
                'material_fk'       => 2,
                'color_fk'          => 4,
                'created_at'        => now()
            ],
            [
                'lamp_name'         => 'Araña Colgante Chryso',
                'lamp_price'        => '150000',
                'lamp_height'       => '80',
                'lamp_stock'        => '60',
                // 'image_fk'          => 1,
                'brand_fk'          => 2,
                'material_fk'       => 3,
                'color_fk'          => 1,
                'created_at'        => now()
            ],
            [
                'lamp_name'         => 'Velador Lyon',
                'lamp_price'        => '86000',
                'lamp_height'       => '26',
                'lamp_stock'        => '100',
                // 'image_fk'          => 1,
                'brand_fk'          => 1,
                'material_fk'       => 4,
                'color_fk'          => 3,
                'created_at'        => now()
            ],
            [
                'lamp_name'         => 'Colgante Trevor',
                'lamp_price'        => '500000',
                'lamp_height'       => '100',
                'lamp_stock'        => '160',
                // 'image_fk'          => 1,
                'brand_fk'          => 3,
                'material_fk'       => 1,
                'color_fk'          => 1,
                'created_at'        => now()
            ],
            [
                'lamp_name'         => 'Lampara Apply',
                'lamp_price'        => '107000',
                'lamp_height'       => '170',
                'lamp_stock'        => '30',
                // 'image_fk'          => 1,
                'brand_fk'          => 2,
                'material_fk'       => 2,
                'color_fk'          => 3,
                'created_at'        => now()
            ],
        ]);
    }
}
