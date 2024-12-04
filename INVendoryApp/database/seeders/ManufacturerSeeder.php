<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Manufacturer;
use App\Models\Category;

class ManufacturerSeeder extends Seeder
{
    public function run(): void
    {
        $category = Category::all();

        $manufacturers = [
            ['name' => 'Coca Cola Company', 'category_id' => $category->where('name', 'Beverages')->first()->id],
            ['name' => 'Monde M.Y. San Corporation', 'category_id' => $category->where('name', 'Food')->first()->id],
            ['name' => 'Unilever', 'category_id' => $category->where('name', 'Necessities')->first()->id],
        ];

        foreach ($manufacturers as $manufacturer) {
            Manufacturer::create($manufacturer);
        }
    }
}
