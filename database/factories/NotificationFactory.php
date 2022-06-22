<?php

namespace Database\Factories;

use App\Models\Notification;
use Illuminate\Database\Eloquent\Factories\Factory;

class NotificationFactory extends Factory
{
    protected $model = Notification::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->randomNumber(3),
            'type' => 'App\Notifications\BountyFilledNotification',
            'notifiable_type' => 'App\Models\User',
            'notifiable_id' => 1,
            'data' => '{"slug":"omnis","content":"Some Content","title":"Bounty Filled","item_name":"omnis"}'
        ];
    }
}
