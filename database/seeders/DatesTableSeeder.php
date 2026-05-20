<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $batchSize = 500;
        $batch = [];

        // Ambil tanggal terakhir yang ada di table
        $lastDate = DB::table('dates')
            ->orderByDesc('date')
            ->value('date');

        // Jika belum ada data
        if (!$lastDate) {

            // Start dari hari ini
            $startDate = Carbon::today();

            // End 1 tahun dari sekarang
            $endDate = Carbon::today()->copy()->addYear();

        } else {

            // Start dari sehari setelah tanggal terakhir
            $startDate = Carbon::parse($lastDate)->addDay();

            // End 1 tahun dari tanggal terakhir
            $endDate = Carbon::parse($lastDate)->addYear();
        }

        // Generate tanggal
        while ($startDate->lte($endDate)) {

            $batch[] = [
                'date' => $startDate->format('Y-m-d'),
            ];

            // Batch insert
            if (count($batch) >= $batchSize) {
                DB::table('dates')->insert($batch);
                $batch = [];
            }

            $startDate->addDay();
        }

        // Insert sisa batch
        if (!empty($batch)) {
            DB::table('dates')->insert($batch);
        }
    }
}