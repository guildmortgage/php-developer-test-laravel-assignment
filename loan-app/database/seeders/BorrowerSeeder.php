<?php

namespace Database\Seeders;

use App\Models\BankAccount;
use App\Models\Borrower;
use App\Models\Job;
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
            ->count(1)
            ->create()
            ->each(function ($borrower) {
                $job = Job::factory()->make();
                $borrower->job()->save($job);
            });

        Borrower::factory()
            ->count(1)
            ->create()
            ->each(function ($borrower) {
                $job = Job::factory()->make();
                $borrower->job()->save($job);

                $bankAccounts = BankAccount::factory()->count(2)->make();
                $borrower->bankAccounts()->saveMany($bankAccounts);
            });
    }
}
