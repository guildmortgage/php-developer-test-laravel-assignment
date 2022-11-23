<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\BankAccount;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class AnnualIncomeController extends Controller
{
    /**
     * Shows the total annual income and bank account values for the application
     * @return Response
     * @throws BindingResolutionException 
     */
    public function report()
    {
        $query = BankAccount::totalBalances();

        $totalAnnualIncome = $query->map(function($year) {
            return ['total_annual_income' =>$year->sum('balance')];
        });

        return response(['data' => $totalAnnualIncome]);
    }
}
