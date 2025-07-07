<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class HoursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $hours = [];

        for ($i = 0; $i < 24; $i++) {
            $hour_time = sprintf('%02d:00', $i);

            $hours[] = [
                'id' => $i + 1,
                'hour_time' => $hour_time,
            ];
        }

        DB::table('hours')->insert($hours);
    }
}
