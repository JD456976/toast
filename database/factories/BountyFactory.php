<?php

namespace Database\Factories;

use App\Models\Bounty;
use App\Models\Brand;
use App\Models\Deal;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BountyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bounty::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'deal_id' => Deal::factory(),
            'product_id' => Product::factory(),
            'store_id' => Store::factory(),
            'brand_id' => Brand::factory(),
            'item_name' => $this->faker->word,
            'description' => $this->faker->text,
            'item_url' => $this->faker->url(),
            'award' => $this->faker->numberBetween(10, 50),
            'is_filled' => $this->faker->boolean,
            'filled_id' => User::factory(),
            'is_verified' => $this->faker->boolean,
            'is_active' => $this->faker->boolean,
            'is_featured' => $this->faker->boolean,
        ];
    }
}
