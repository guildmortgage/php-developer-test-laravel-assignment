<?php

namespace Database\Seeders;


use App\Models\Borrowers;
use App\Models\Employers as EmployersModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Employers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Borrowers = Borrowers::where(['name' => 'Clark Kent'])->first();

        EmployersModel::create(
            [
                'borrower_id' => $Borrowers->id,
                'position'    => 'Writer',
                'income'      => 125000.00,
            ],
        );

        $Borrowers = Borrowers::where(['name' => 'Hal Jordan'])->first();

        EmployersModel::create(
            [
                'borrower_id' => $Borrowers->id,
                'position'    => 'Test Pilot',
                'income'      => 175000.00,
            ],
        );

    }
}
