<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tool>
 */
class ToolFactory extends Factory
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
        $poolIds = \App\Models\Pool::all()->pluck('id')->toArray();

        return [
            'hardware_id' => $this->faker->randomElement($hardwareIds),
            'pool_id' => $this->faker->randomElement($poolIds),
            'time' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'temperature' => $this->faker->randomFloat(2, 20, 40),
            'ph' => $this->faker->randomFloat(2, 0, 14),
            'salinity' => $this->faker->randomFloat(2, 0, 40),
            'do' => $this->faker->randomFloat(2, 0, 20),
        ];
    }
}
