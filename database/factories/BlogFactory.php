<?php

namespace Database\Factories;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Blog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => $this->faker->word(),
            'content' => $this->faker->paragraphs(3, true),
            'slug' => $this->faker->slug,
            'cat_id' => BlogCategory::factory(),
            'is_featured' => $this->faker->boolean,
            'is_active' => $this->faker->boolean,
        ];
    }
}
