<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PoolSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\Pool::factory(100)->create();
    }
}
