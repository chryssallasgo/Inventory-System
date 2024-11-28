<?php

namespace Database\Seeders;


use App\Models\PartCategory;
use App\Models\Manufacturer;
use App\Models\PCPart;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;


class PartCategorySeeder extends Seeder
{
   PartCategory::factory()
    ->count(10)
    ->sequence(fn($sequence) => ['pcpart_name' => 'PartCategory' . $sequence->index +1])
    ->has(
        Manufacturer::factory()
            ->count(2)
            ->state(
                new Sequence(
                    [ 'pcpart_name' => 'Intel'],
                    [ 'pcpart_name' => 'AMD'],
                    [ 'pcpart_name' => 'Nvidia'],
                )
            )
        ->has(
            PCPart::factory()
            ->count(5)
            ->state(
                fn(array $attributes, Manufacturer $manufacturer) => ['partcategory_id' => $manufacturer->partcategory_id]
            )
        )
    )
    ->create();
}
