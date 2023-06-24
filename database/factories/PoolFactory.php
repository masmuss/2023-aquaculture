<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PoolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $pond = \App\Models\Pond::all();
        $hardwareIds = $pond->pluck('hardware_id')->toArray();

        return [
            'user_id' => $this->faker->randomElement(\App\Models\User::pluck('id')->toArray()),
            'hardware_id' => $this->faker->randomElement($hardwareIds),
            'name' => $this->faker->name(),
            'wide' => $this->faker->randomFloat(2, 1, 100),
            'long' => $this->faker->randomFloat(2, 1, 100),
            'depth' => $this->faker->randomFloat(2, 1, 100),
            'noted' => $this->faker->text(),
        ];
    }
}
