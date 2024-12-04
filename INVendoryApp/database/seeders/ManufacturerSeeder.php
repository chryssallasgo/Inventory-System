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
            ['name' => 'Nestlé', 'category_id' => $category->where('name', 'Food')->first()->id],
            ['name' => 'PepsiCo', 'category_id' => $category->where('name', 'Beverages')->first()->id],
            ['name' => 'Kraft Heinz', 'category_id' => $category->where('name', 'Food')->first()->id],
            ['name' => 'Dr Pepper Snapple Group', 'category_id' => $category->where('name', 'Beverages')->first()->id],
            ['name' => 'Procter & Gamble', 'category_id' => $category->where('name', 'Necessities')->first()->id],
            ['name' => 'Johnson & Johnson', 'category_id' => $category->where('name', 'Necessities')->first()->id],
            ['name' => 'Monster Beverage Corporation', 'category_id' => $category->where('name', 'Beverages')->first()->id],
            ['name' => 'Red Bull GmbH', 'category_id' => $category->where('name', 'Beverages')->first()->id],
            ['name' => 'Kimberly-Clark', 'category_id' => $category->where('name', 'Necessities')->first()->id],
        ];

        foreach ($manufacturers as $manufacturer) {
            Manufacturer::create($manufacturer);
        }
    }
}
