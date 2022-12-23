<?php

namespace App\Http\Controllers;

use App\Models\Borrowers;
use Illuminate\Http\Request;

class BorrowersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loans = Borrowers::leftjoin('employers','employers.borrower_id', '=', 'borrowers.id')
                    ->leftjoin('bank_accounts','bank_accounts.borrower_id', '=', 'borrowers.id')
                    ->selectRaw('borrowers.name, sum(IFNULL(employers.income,0) + IFNULL(bank_accounts.balance,0)) as totalIncome')
                    ->groupBy('borrowers.name')
                    ->orderBy('borrowers.name')
                    ->get();
       
        return [
            "status" => 1,
            "data" => $loans,
        ];
    }
}
