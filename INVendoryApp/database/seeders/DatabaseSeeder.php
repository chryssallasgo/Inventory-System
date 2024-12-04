<?php

namespace Database\Seeders;

use App\Models\Manufacturer;
use App\Models\Category;
use App\Models\Item;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       // PCPart::factory(10)->create();

        $this->call([
            CategorySeeder::class,
            ManufacturerSeeder::class,
            ItemSeeder::class
        ]);
    }
}
