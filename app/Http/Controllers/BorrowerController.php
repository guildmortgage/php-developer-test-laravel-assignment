<?php

namespace App\Http\Controllers;

use App\Http\Services\BorrowerService;
use Illuminate\Http\JsonResponse;

class BorrowerController extends Controller
{
    /**
     * Returns with the total annual income and bank account values
     * @return JsonResponse
     */
    public function getTotals(): JsonResponse
    {
        return response()->json([
            'data'  => [
                'salaries'  => BorrowerService::getTotalAnnualSalaries(),
                'balances'  => BorrowerService::getTotalBalances(),
                ]
            ]
        );
    }
}
