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
            $start = sprintf('%02d:00', $i);
            $end = sprintf('%02d:00', $i);// 23:00 -> 00:00

            $hours[] = [
                'id' => $i + 1,
                'start_time' => $start,
                'end_time' => $end,
            ];
        }

        DB::table('hours')->insert($hours);
    }
}
