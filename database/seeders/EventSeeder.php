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
        DB::table("event")->insert([
            "id" => 1,
            "name" => "HTML",
            "logo" => "https://rapidapi.com/blog/wp-content/uploads/2018/06/logo-2582748_640.png",
            "self_rating" => 5,
            "experience" => 5,
            "recency" => 5,
            "interest" => 4
        ]);
    }
}
