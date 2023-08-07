<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProvinceSeeder extends Seeder
{
    public function run(): void
    {
        $json = File::get("database/data/provinces.json");
        $data = json_decode($json);
        $provinces = [];
        foreach ($data as $obj) {
            $provinces[] = [
                'id' => $obj->id,
                'name' => $obj->name,
            ];
        }

        DB::table('provinces')->insert(
            $provinces
        );
    }
}
