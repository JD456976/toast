<?php

namespace Database\Factories;

use App\Models\StoreCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class StoreCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = StoreCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'parent_id' => $this->faker->numberBetween(1, 10),
            'name' => $this->faker->word(),
            'description' => $this->faker->words(6, true),
            'slug' => $this->faker->slug,
        ];
    }
}
