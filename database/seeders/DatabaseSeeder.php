<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Borrower;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Borrower::truncate();

        DB::table('borrowers')->insert([
            [
            "name" => "Jack",
            "hasJob" => 1,
            "hasAccount" => 0,
            "annual_income" => 0
            ],
            [
            "name" => "Dorsy",
            "hasJob" => 1,
            "hasAccount" => 1,
            "annual_income" => 80000
            ]
        ]);
    }
}
