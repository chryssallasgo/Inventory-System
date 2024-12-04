<?php

namespace Database\Factories;

use App\Models\PartCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PartCategory>
 */
class PartCategoryFactory extends Factory
{
    protected $model = PartCategory::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'name' => $this->faker->randomElement(['Beverages', 'Food', 'Necessities']),
        ];
    }
}
