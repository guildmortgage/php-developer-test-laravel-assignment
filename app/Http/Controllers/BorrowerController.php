<?php

namespace App\Http\Controllers;

use App\Models\Borrower;
use Illuminate\Http\Request;

class BorrowerController extends Controller
{
    public function index()
    {
        $data = Borrower::get(['name', 'hasJob', 'hasAccount', 'annual_income']);
        return response()->json($data);
    }

}
