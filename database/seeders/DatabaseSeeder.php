<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the database.
     */
    public function run(): void
    {

        \App\Models\LoanApplication::factory()->create([
            'id' => 1,
            'loan_amount' => 100000
        ]);

        \App\Models\Borrower::factory()->create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'middle_name' => 'Smith',
            'annual_salary' => 50000,
            'total_bank_balance' => 100000,
            'loan_application_id' => 1,
        ]);

        \App\Models\Borrower::factory()->create([
            'first_name' => 'Jane',
            'last_name' => 'Smith',
            'middle_name' => null,
            'total_bank_balance' => null,
            'loan_application_id' => 1,
            'annual_salary' => 50000,
        ]);
    }
}