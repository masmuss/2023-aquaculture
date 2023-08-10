<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class RecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $poolIds = \App\Models\Pool::all()->pluck('id')->toArray();
        $hardwareIds = \App\Models\Hardware::all()->pluck('id')->toArray();

        return [
            'pool_id' => $poolIds[array_rand($poolIds)],
            'hardware_id' => $hardwareIds[array_rand($hardwareIds)],
            'time' => fake()->date('Y-m-d H:i:s'),
            'temperature' => fake()->randomFloat(2, 0, 100),
            'ph' => fake()->randomFloat(2, 0, 14),
            'salinity' => fake()->randomFloat(2, 0, 100),
            'do' => fake()->randomFloat(2, 0, 100),
        ];
    }
}
