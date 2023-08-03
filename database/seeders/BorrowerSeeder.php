<?php

namespace Database\Seeders;

use App\Models\Borrower;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BorrowerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Borrower::factory()
            ->hasJobs(1)
            ->create();

        Borrower::factory()
            ->hasJobs(1)
            ->hasBankAccounts(1)
            ->create();
    }
}
