<?php

namespace Database\Factories;
use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Faker\CustomFakerProvider;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Items>
 */
class ItemFactory extends Factory
{
    protected $model = Item::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $this->faker->addProvider(new CustomFakerProvider($this->faker));

        $itemname = $this->faker->item_name(); 
        $category = $this->faker->category($itemname);

        $CategoryModel = \App\Models\Category::firstOrCreate(['name' => $category]);
        
        return [
            'item_name' => $itemname,
            'item_price' => $this->faker->randomFloat(2, 15, 200),
            'item_quantity' => $this->faker->numberBetween(1, 100),
            'category_id' => $CategoryModel->id,
            'manufacturer_id' => \App\Models\Manufacturer::factory(),           
        ];
    }
}
