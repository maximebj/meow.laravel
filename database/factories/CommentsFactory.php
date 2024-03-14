<?php

namespace Database\Factories;

use App\Models\Messages;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CommentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'content' => fake()->unique()->text(35),
            'message_id' => Messages::all()->random()->id,
            'user_id' => User::all()->random()->id
        ];
    }
}
