<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PartCategory;
use App\Models\Manufacturer;
use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;



class PartCategorySeeder extends Seeder
{
    public function run(): void
    {
        $category = ['Beverages', 'Food', 'Necessities']; 
        foreach ($category as $category) 
        { 
            PartCategory::create(['name' => $category]);
        }     
    }
}
