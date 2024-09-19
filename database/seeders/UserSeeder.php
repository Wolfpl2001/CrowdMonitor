<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("users")->insert([
            "id" => 1,
            "username" => "admin",
            "password" => "supersecretlolplsdonothack",
            "company" => "Gilde DevOps",
            "phone" => 31614962215,
            "type" => 1,
            "created_at" => now(),
            "updated_at" => now()
        ]);
    }
}
