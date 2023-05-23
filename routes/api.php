<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoanApplicationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/loan-applications/{id}/annual-income', [LoanApplicationController::class, 'getAnnualIncome']);
Route::get('/loan-applications/{id}/bank-account-value', [LoanApplicationController::class, 'getBankAccountValue']);
Route::get('/loan-applications/{id}/totals', [LoanApplicationController::class, 'getTotals']);
Route::post('/loan-applications/add', [LoanApplicationController::class, 'addLoanApplication']);
