<?php

namespace Database\Seeders;
use App\Models\Borrowers as BorrowersModel;
use Illuminate\Database\Seeder;


class Borrowers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        BorrowersModel::create(
            [
                'name' => 'Clark Kent',
            ],
        );

        BorrowersModel::create(
            [
                'name' => 'Hal Jordan',
            ],
        );

    }
}
