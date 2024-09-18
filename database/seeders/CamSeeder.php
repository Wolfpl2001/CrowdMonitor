<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("cams")->insert([
            "id" => 1,
            "event_id" => 1,
            "inflow" => 101,
            "outflow" => 13,
            "temperature" => 26.6,
            "weather_code" => 1, //Sunny
            "created_at" => now()->subMinutes(10),
            "updated_at" => now()->subMinutes(10)
        ]);

        DB::table("cams")->insert([
            "id" => 2,
            "event_id" => 1,
            "inflow" => 34,
            "outflow" => 1,
            "temperature" => 26.4,
            "weather_code" => 2, //Slightly clouded
            "created_at" => now()->subMinutes(5),
            "updated_at" => now()->subMinutes(5)
        ]);

        DB::table("cams")->insert([
            "id" => 3,
            "event_id" => 1,
            "inflow" => 67,
            "outflow" => 87,
            "temperature" => 26.6,
            "weather_code" => 2, //Slightly clouded
            "created_at" => now(),
            "updated_at" => now()
        ]);
    }
}
