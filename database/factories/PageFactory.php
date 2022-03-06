<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Page;

class PageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Page::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->word(),
            'slug' => $this->faker->slug,
            'content' => $this->faker->paragraphs(3, true),
            'is_active' => $this->faker->boolean,
            'footer_menu' => $this->faker->boolean,
            'header_menu' => $this->faker->boolean,
        ];
    }
}
