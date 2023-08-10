<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            RegionSeeder::class,
            HardwareSeeder::class,
            PondSeeder::class,
            PoolSeeder::class,
            MonitoringSeeder::class,
            SamplingSeeder::class
        ]);
    }
}
