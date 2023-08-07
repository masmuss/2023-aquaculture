<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class RegencySeeder extends Seeder
{
    public function run(): void
    {
        $json = File::get("database/data/regencies.json");
        $data = json_decode($json);
        $regencies = [];
        foreach ($data as $obj) {
            $regencies[] = [
                'id' => $obj->id,
                'province_id' => $obj->province_id,
                'name' => $obj->name,
            ];
        }

        DB::table('regencies')->insert($regencies);
    }
}
