<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BorrowersController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/view_all', [BorrowersController::class, 'jsonapi'])->name('view_all');

Route::get('/view_one/{id}', [BorrowersController::class, 'show']);
