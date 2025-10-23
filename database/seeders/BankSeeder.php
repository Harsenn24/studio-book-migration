<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;




class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $json = File::get(database_path('data/bank.json'));

        $data = json_decode($json, true);

        if (!is_array($data)) {
            throw new \Exception('Invalid JSON format in province.json');
        }

        $now = Carbon::now()->timestamp;


        foreach ($data as $item) {
            // Assume "name" is the only field in the table
            DB::table('banks')->insert([
                'code' => $item['code'],
                'rtgs_code' => $item['rtgs_code'],
                'bi_code' => $item['bi_code'],
                'prima_code' => $item['prima_code'],
                'name' => $item['name'],
                'alias' => $item['alias'],
                'created_at' => $now,
                'updated_at' => $now
            ]);
        }
    }
}
