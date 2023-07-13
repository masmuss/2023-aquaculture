<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pond>
 */
class PondFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userIds = \App\Models\User::where('is_admin', false)->pluck('id')->toArray();

        return [
            'name' => fake()->words(2, true),
            'user_id' => $userIds[array_rand($userIds)],
            'hardware_id' => fake()->regexify('[A-Z]\d{2}\.\d'),
            'address' => fake()->address(),
        ];
    }
}
