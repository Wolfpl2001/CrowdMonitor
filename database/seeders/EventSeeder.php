<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("events")->insert([
            "id" => 1,
            "event_name" => "X-perience Day",
            "max_visitors" => 10001,
            "start" => "2024-09-22 12:00:00",
            "end" => "2024-09-25 23:59:59",
            "street" => "Bredeweg",
            "house_number" => 235,
            "postal_code" => "6042GE",
            "city" => "Roermond",
            "country_code" => "NL",
            "user_id" => 1,
            "created_at" => now()->subMinutes(5),
            "updated_at" => now()
        ]);
    
        DB::table("events")->insert([
            "id" => 2,
            "event_name" => "event",
            "max_visitors" => 10002,
            "start" => "2024-09-22 12:00:00",
            "end" => "2024-09-25 23:59:59",
            "street" => "Bredeweg",
            "house_number" => 235,
            "postal_code" => "6042GE",
            "city" => "Roermond",
            "country_code" => "NL",
            "user_id" => 1,
            "created_at" => now()->subMinutes(5),
            "updated_at" => now()
        ]);
    }
}
