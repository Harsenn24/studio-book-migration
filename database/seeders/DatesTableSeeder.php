<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $startDate = Carbon::create(2025, 10, 9);
        $endDate = Carbon::create(2026, 10, day: 9);

        $batchSize = 500; // untuk batch insert
        $batch = [];

        while ($startDate->lte($endDate)) {
            $batch[] = [
                'date' => $startDate->format('Y-m-d'),
            ];

            // Batch insert setiap 500 records
            if (count($batch) === $batchSize) {
                DB::table('dates')->insert($batch);
                $batch = [];
            }

            $startDate->addDay();
        }

        // Insert sisa data
        if (!empty($batch)) {
            DB::table('dates')->insert($batch);
        }
    }
}
