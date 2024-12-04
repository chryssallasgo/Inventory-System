<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Manufacturer;
use App\Models\PartCategory;

class ManufacturerSeeder extends Seeder
{
    public function run(): void
    {
        $category = PartCategory::all();

        $manufacturers = [
            ['name' => 'Coca Cola Company', 'partcategory_id' => $category->where('name', 'Beverages')->first()->id],
            ['name' => 'Monde M.Y. San Corporation', 'partcategory_id' => $category->where('name', 'Food')->first()->id],
            ['name' => 'Unilever', 'partcategory_id' => $category->where('name', 'Necessities')->first()->id],
        ];

        foreach ($manufacturers as $manufacturer) {
            Manufacturer::create($manufacturer);
        }
    }
}
