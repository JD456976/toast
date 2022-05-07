<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'commentable_type' => User::factory(),
            'commentable_id' => User::factory(),
            'comment' => $this->faker->paragraphs(3, true),
            'is_reported' => $this->faker->boolean,
        ];
    }
}
