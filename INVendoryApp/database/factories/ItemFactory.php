<?php

namespace Database\Factories;
use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Faker\CustomFakerProvider;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PCParts>
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
        $partcategory = $this->faker->partcategory($itemname);

        $partCategoryModel = \App\Models\PartCategory::firstOrCreate(['name' => $partcategory]);
        
        return [
            'item_name' => $itemname,
            'item_price' => $this->faker->randomFloat(2, 15, 200),
            'item_quantity' => $this->faker->numberBetween(1, 100),
            'partcategory_id' => $partCategoryModel->id,
            'manufacturer_id' => \App\Models\Manufacturer::factory(),           
        ];
    }
}
