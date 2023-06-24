<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PondSeeder extends Seeder
{
    public function run(): void
    {
        $userId = \App\Models\User::where('email', 'admin@test.com')->first()->id;

        $ponds = [
            [
                'name' => 'Kolam 1',
                'user_id' => $userId,
                'hardware_id' => fake()->regexify('[A-Z]\d{2}\.\d'),
                'address' => fake()->address('id_ID'),
            ],
            [
                'name' => 'Kolam 2',
                'user_id' => $userId,
                'hardware_id' => fake()->regexify('[A-Z]\d{2}\.\d'),
                'address' => fake()->address('id_ID'),
            ],
            [
                'name' => 'Kolam 3',
                'user_id' => $userId,
                'hardware_id' => fake()->regexify('[A-Z]\d{2}\.\d'),
                'address' => fake()->address('id_ID'),
            ],
            [
                'name' => 'Kolam 4',
                'user_id' => $userId,
                'hardware_id' => fake()->regexify('[A-Z]\d{2}\.\d'),
                'address' => fake()->address('id_ID'),
            ],
            [
                'name' => 'Kolam 5',
                'user_id' => $userId,
                'hardware_id' => fake()->regexify('[A-Z]\d{2}\.\d'),
                'address' => fake()->address('id_ID'),
            ],
            [
                'name' => 'Kolam 6',
                'user_id' => $userId,
                'hardware_id' => fake()->regexify('[A-Z]\d{2}\.\d'),
                'address' => fake()->address('id_ID'),
            ],
            [
                'name' => 'Kolam 7',
                'user_id' => $userId,
                'hardware_id' => fake()->regexify('[A-Z]\d{2}\.\d'),
                'address' => fake()->address('id_ID'),
            ],
            [
                'name' => 'Kolam 8',
                'user_id' => $userId,
                'hardware_id' => fake()->regexify('[A-Z]\d{2}\.\d'),
                'address' => fake()->address('id_ID'),
            ],
        ];

        foreach ($ponds as $pond) {
            \App\Models\Pond::create($pond);
        }
    }
}
