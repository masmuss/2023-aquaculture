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
        $regencyIds = \App\Models\Regency::all()->pluck('id')->toArray();

        return [
            'name' => fake()->words(2, true),
            'user_id' => $userIds[array_rand($userIds)],
            'regency_id' => $regencyIds[array_rand($regencyIds)],
            'address' => fake()->address(),
        ];
    }
}
