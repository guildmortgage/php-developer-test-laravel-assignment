<?php

namespace Tests\Feature;

use App\Http\Services\BorrowerService;
use App\Models\BankAccount;
use App\Models\Borrower;
use App\Models\Job;
use Database\Seeders\RoleSeeder;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TotalsTest extends TestCase
{
    use DatabaseMigrations, RefreshDatabase;

    public function salaryDataProvider(): array
    {
        return [
            'one borrower one job'  => [ [[10500.12]], 10500.12],
            'one borrower multiple jobs' => [ [[8900.00,57420.12]], 66320.12],
            'multiple borrowers one job' => [ [[1000],[1500],[2300]], 4800],
            'multiple borrowers various jobs' => [ [[1000,500],[1500],[]], 3000],
        ];
    }

    /**
     * @dataProvider salaryDataProvider
     */
    public function test_total_annual_salary_value($borrowers, $expected)
    {
        $this->seed(RoleSeeder::class);

        foreach($borrowers as $borrowerSalaries){
            Borrower::factory()
                ->has(
                    Job::factory()
                        ->count(count($borrowerSalaries))
                        ->sequence(fn (Sequence $sequence) => ['annual_salary' => $borrowerSalaries[$sequence->index]]))
                ->create();
        }

        $this->assertEquals($expected, BorrowerService::getTotalAnnualSalaries());
    }

    public function BalanceDataProvider(): array
    {
        return [
            'one borrower one bank account'  => [ [[12400]], 12400],
            'one borrower multiple bank accounts' => [ [[13750,3882.22]], 17632.22],
            'multiple borrowers one bank account' => [ [[56980.10],[11900],[2300.77]], 71180.87],
            'multiple borrowers various bank accounts' => [ [[4592.5,500],[1560],[]], 6652.5],
        ];
    }

    /**
     * @dataProvider BalanceDataProvider
     */
    public function test_total_balance_value($borrowers, $expected)
    {
        $this->seed(RoleSeeder::class);

        foreach($borrowers as $borrowerBalances){
            Borrower::factory()
                ->has(
                    BankAccount::factory()
                        ->count(count($borrowerBalances))
                        ->sequence(fn (Sequence $sequence) => ['balance' => $borrowerBalances[$sequence->index]]))
                ->create();
        }

        $this->assertEquals($expected, BorrowerService::getTotalBalances());
    }


}
