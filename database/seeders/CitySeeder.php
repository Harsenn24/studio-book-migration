<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $json = File::get(database_path('data/city.json'));

        $data = json_decode($json, true);

        if (!is_array($data)) {
            throw new \Exception('Invalid JSON format in province.json');
        }

        $now = Carbon::now()->timestamp;


        foreach ($data as $item) {
            // Assume "name" is the only field in the table
            DB::table('cities')->insert([
                'name' => $item['name'],
                'province_id' => $item['province_id'],
                'created_at' => $now,
                'updated_at' => $now
            ]);
        }
    }
}
