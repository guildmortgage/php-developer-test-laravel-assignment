<?php

namespace Database\Seeders;

use App\Models\BankAccounts as BankAccountsModel;
use App\Models\Borrowers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BankAccounts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Borrowers = Borrowers::where(['name' => 'Clark Kent'])->first();

        BankAccountsModel::create(
            [
                'borrower_id' => $Borrowers->id,
                'bankName'    => 'PNC',
                'balance'     => 100000.00,
            ],
        );
    }
}
