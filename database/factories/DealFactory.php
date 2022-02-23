<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Brand;
use App\Models\Deal;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;

class DealFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Deal::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::factory(),
            'store_id' => Store::factory(),
            'brand_id' => Brand::factory(),
            'user_id' => User::factory(),
            'approver_id' => User::factory(),
            'title' => $this->faker->sentence(4),
            'discount' => $this->faker->word,
            'price' => $this->faker->word,
            'price_extras' => $this->faker->word,
            'description' => $this->faker->text,
            'url' => $this->faker->url,
            'slug' => $this->faker->slug,
            'is_active' => $this->faker->boolean,
            'is_frontpage' => $this->faker->boolean,
            'is_featured' => $this->faker->boolean,
        ];
    }
}
