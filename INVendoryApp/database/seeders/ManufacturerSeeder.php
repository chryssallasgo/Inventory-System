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
            ['name' => 'Gigabyte', 'partcategory_id' => $category->where('name', 'MOBO')->first()->id], 
            ['name' => 'MSI', 'partcategory_id' => $category->where('name', 'MOBO')->first()->id], 
            ['name' => 'Kingston', 'partcategory_id' => $category->where('name', 'RAM')->first()->id], 
            ['name' => 'Corsair', 'partcategory_id' => $category->where('name', 'RAM')->first()->id], 
            ['name' => 'Asus', 'partcategory_id' => $category->where('name', 'MOBO')->first()->id], 
            ['name' => 'Samsung', 'partcategory_id' => $category->where('name', 'SSD')->first()->id], 
            ['name' => 'Western Digital', 'partcategory_id' => $category->where('name', 'HDD')->first()->id],
            ['name' => 'Cooler Master', 'partcategory_id' => $category->where('name', 'PSU')->first()->id],
        ];

        foreach ($manufacturers as $manufacturer) {
            Manufacturer::create($manufacturer);
        }
    }
}
