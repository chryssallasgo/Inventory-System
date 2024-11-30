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
            ['name' => 'Intel', 'partcategory_id' => $category->where('name', 'CPU')->first()->id],
            ['name' => 'AMD', 'partcategory_id' => $category->where('name', 'CPU')->first()->id],
            ['name' => 'Nvidia', 'partcategory_id' => $category->where('name', 'GPU')->first()->id],
        ];

        foreach ($manufacturers as $manufacturer) {
            Manufacturer::create($manufacturer);
        }
    }
}
