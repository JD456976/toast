<?php

namespace Database\Factories;

use App\Models\Deal;
use App\Models\Report;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class ReportFactory extends Factory
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
            'reportable_type' => Deal::factory(),
            'reportable_id' => Deal::factory(),
            'reason' => $this->faker->words(3, true),
            'comment' => $this->faker->sentence(6, true),
            'is_resolved' => $this->faker->boolean(),
        ];
    }
}
