<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Manufacturer;
use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;



class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = ['Beverages', 'Food', 'Necessities']; 
        foreach ($categories as $category) 
        { 
            Category::create(['name' => $category]);
        }     
    }
}
