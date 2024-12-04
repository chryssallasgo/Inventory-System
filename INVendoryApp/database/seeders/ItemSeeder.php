<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;
use App\Models\PartCategory;
use App\Models\Manufacturer;

class ItemSeeder extends Seeder
{
    public function run(): void
    {
        // Ensure that PartCategory and Manufacturer data is already seeded
        $category = PartCategory::all();
        $manufacturers = Manufacturer::all();

        // Use the factory to create PCPart instances
        Item::factory()
            ->count(50) // Adjust the count as needed
            ->create()
            ->each(function ($item) use ($category, $manufacturers) {
                // Assign random category and manufacturer
                $partcategory = $category->firstWhere('name', $item->partcategory->name);
                $item->partcategory_id = $partcategory->id;

                $item->manufacturer_id = $manufacturers->random()->id;
                $item->save();
            });
    }
}
