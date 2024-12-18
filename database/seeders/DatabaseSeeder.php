<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ColorSeeder::class,
            MarcaSeeder::class,
            MaterialSeeder::class,
            LamparasSeeder::class,
            BlogSeeder::class,
            OrdersSeeder::class,
            OrderItemsSeeder::class
        ]);
    }
}
