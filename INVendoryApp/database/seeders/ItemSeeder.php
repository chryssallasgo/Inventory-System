<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;
use App\Models\Category;
use App\Models\Manufacturer;

class ItemSeeder extends Seeder
{
    public function run(): void
    {
        // Ensure that Category and Manufacturer data is already seeded
        $category = Category::all();
        $manufacturers = Manufacturer::all();

        // Use the factory to create PCPart instances
        Item::factory()
            ->count(50) // Adjust the count as needed
            ->create()
            ->each(function ($item) use ($category, $manufacturers) {
                // Assign random category and manufacturer
                $category = $category->firstWhere('name', $item->category->name);
                $item->category_id = $category->id;

                $item->manufacturer_id = $manufacturers->random()->id;
                $item->save();
            });
    }
}
