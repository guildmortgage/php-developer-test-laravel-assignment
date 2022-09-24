<?php

use App\Http\Controllers\api\AnnualIncomeController;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\BorrowerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


// Register/Login and get an access token
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::apiResource('/borrower', BorrowerController::class)->middleware('auth:api');

Route::get('/total-annual-income', [AnnualIncomeController::class, 'report'])->middleware('auth:api');
