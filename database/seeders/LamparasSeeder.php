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
                'lamp_image'        => 'images/7M9U3YOQydbihw2p5U1inPXRPbygRALJyuUCre9V.jpg',
                'lamp_image_alt'    => 'lampara de mesa. la base es una U conectada con una bara curva que conecta con la bombilla. Esta esta rodeada por una cortina de cristales.',
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
                'lamp_image'        => 'images/rJqzqQGK1ogxDhhcOHNAhWEeM0heXhiiUXBrMega.jpg',
                'lamp_image_alt'    => 'lampara de techo, dos cajas negras que cuelgan del techo conectadas por una cinta de metal dando vueltas.',
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
                'lamp_image'        => 'images/b6jibUbEOmUiHWGpcBOkJQRpp99J3Iervfcn9ULN.jpg',
                'lamp_image_alt'    => 'lampara de techo, una bara central es interceptada por otras dos',
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
                'lamp_image'        => 'images/9zVNqBi1aD70cojhxu2kAf2HY18M24L6AG0m1Ve6.jpg',
                'lamp_image_alt'    => 'lampara en forma de tulipan',
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
                'lamp_image'        => 'images/YRX5KqAEzGYEyRQyKOqm6NSMiYtQcjneCuh43sHv.jpg',
                'lamp_image_alt'    => 'una lampara de piso regular. un tubo liso que da a una bombilla.',
                'brand_fk'          => 2,
                'material_fk'       => 2,
                'color_fk'          => 3,
                'created_at'        => now()
            ],
        ]);
    }
}
