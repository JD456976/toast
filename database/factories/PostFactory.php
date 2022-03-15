<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\PostCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

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
            'cat_id' => PostCategory::factory(),
            'is_featured' => $this->faker->boolean,
            'is_active' => $this->faker->boolean,
        ];
    }
}
