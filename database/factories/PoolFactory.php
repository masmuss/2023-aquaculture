<?php

namespace Database\Factories;

use App\Models\Hardware;
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
        $hardwareModel = Hardware::all();
        $hardwareIds = $hardwareModel->pluck('id')->toArray();
        $pondIds = \App\Models\Pond::all()->pluck('id')->toArray();

        return [
            'pond_id' => $this->faker->randomElement($pondIds),
            'hardware_id' => $this->faker->randomElement($hardwareIds),
            'name' => $this->faker->sentence(2),
            'wide' => $this->faker->randomFloat(2, 1, 100),
            'long' => $this->faker->randomFloat(2, 1, 100),
            'depth' => $this->faker->randomFloat(2, 1, 100),
            'noted' => $this->faker->sentence(5),
        ];
    }
}
