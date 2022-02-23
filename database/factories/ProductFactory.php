<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Product;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'brand_id' => $this->faker->numberBetween(-10000, 10000),
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'slug' => $this->faker->slug,
            'msr' => $this->faker->word,
        ];
    }
}
