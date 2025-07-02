<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $json = File::get(database_path('data/district.json'));

        $data = json_decode($json, true);

        if (!is_array($data)) {
            throw new \Exception('Invalid JSON format in province.json');
        }

        $now = Carbon::now()->timestamp;


        foreach ($data as $item) {
            // Assume "name" is the only field in the table
            DB::table('districts')->insert([
                'name' => $item['name'],
                'city_id' => $item['city_id'],
                'created_at' => $now,
                'updated_at' => $now
            ]);
        }
    }
}
