<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventChangelogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("event_changelog")->insert([
            "id" => 1,
            "event_id" => 1,
            "log" => "Bezoekersaantal opgehoogd",
            "created_at" => now(),
            "updated_at" => now()
        ]);
    }
}
