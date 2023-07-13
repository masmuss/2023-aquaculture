<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PondSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\Pond::factory(100)->create();
    }
}
