<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BorrowersController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create_borrower', [BorrowersController::class, 'create']);

Route::post('/store_borrower', [BorrowersController::class, 'store'])->name('store_borrower');

Route::get('/view_borrower', [BorrowersController::class, 'index']);

Route::get('/edit_borrower/{borrowers}', [BorrowersController::class, 'edit'])->name('edit_borrower');

Route::post('/update_borrower/{id}', [BorrowersController::class, 'update'])->name('update_borrower');

Route::delete('/delete_borrower/{id}', [BorrowersController::class, 'destroy'])->name('delete_borrower');


