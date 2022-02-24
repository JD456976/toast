<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Warn;

class WarnFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Warn::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'staff_id' => User::factory(),
            'reason' => $this->faker->word,
            'content' => $this->faker->paragraphs(3, true),
            'expires' => $this->faker->dateTime(),
        ];
    }
}
