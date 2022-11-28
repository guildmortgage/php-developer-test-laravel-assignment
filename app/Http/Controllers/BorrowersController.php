<?php

namespace App\Http\Controllers;

use App\Models\Borrowers;
use App\Http\Requests\StoreBorrowersRequest;
use App\Http\Requests\UpdateBorrowersRequest;
use Illuminate\Support\Facades\DB; // using this for query builder

class BorrowersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $borrowers = DB::table('borrowers')
            ->join('job_details', 'borrowers.id', '=', 'job_details.job_holder_id')
            ->join('bank_acs', 'borrowers.id', '=', 'bank_acs.acc_owner_id')
            ->join('loan_appls', 'borrowers.id', '=', 'loan_appls.user_id')
            ->select('borrowers.*', 'loan_appls.loan_appl_id', 'job_details.annual_income', 'bank_acs.acc_no')
            ->get();
        return view('index', ['borrowers' => $borrowers]);
        /*
        // Model version:
        $borrowers = borrowers::all();
        return view('index', compact('borrowers')); // index.blade.php


        // Query builder version:
        $borrowers = DB::table('borrowers')->get(); 
        return view('index', ['borrowers' => $borrowers]);
        */
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function jsonapi()
    {
        
        $borrowers = DB::table('borrowers')
            ->join('job_details', 'borrowers.id', '=', 'job_details.job_holder_id')
            ->join('bank_acs', 'borrowers.id', '=', 'bank_acs.acc_owner_id')
            ->join('loan_appls', 'borrowers.id', '=', 'loan_appls.user_id')
            ->select('borrowers.*', 'loan_appls.loan_appl_id', 'job_details.annual_income', 'bank_acs.acc_no')
            ->get();
        // return view('index', ['borrowers' => $borrowers]);
        return response()->json($borrowers, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBorrowersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBorrowersRequest $request)
    {
        //dd($request->all());

        if( (($request->get('annual_income') == null) || ($request->get('annual_income') == "0")) && ($request->get('is_employed') == "1")) {
            return redirect()->back()->with('msgpassed', "Annual income must be specified if borrower has a job!");
        }

        if((($request->get('acc_no') == null) || ($request->get('acc_no') == "0")) && ($request->get('has_bank') == "1")) {
            return redirect()->back()->with('msgpassed', "Account number must be specified if borrower has a bank account!");
        }

        # As I used checkbox I need to ensure that null value is not passed if box is unchecked.
        if(($request->get('is_employed') == null) || ($request->get('is_employed') === 0)) { 
            $request->is_employed = 0;
            $request->annual_income = 0;
        }
        else {
            $request->is_employed = 1;
        }
        
        if(($request->get('has_bank') == null) || ($request->get('has_bank') === 0)) { 
            $request->has_bank = 0;
            $request->acc_no = 0;
        }
        else {
            $request->has_bank = 1;
        }

        $current_datentime = date('Y-m-d H:i:s'); // I decided to skip Carbon\Carbon::now() and use PHP
        $branch_code = '123';
        $sales_rep_id = '456';
        $borrower_id = $branch_code . $sales_rep_id . time(); // can be used for all references

        DB::table('borrowers')->insert([
            'id' => $borrower_id,
            'b_name' => $request->b_name,
            'is_employed' => $request->is_employed,
            'has_bank' => $request->has_bank,
            'created_at' => $current_datentime
        ]);

        DB::table('loan_appls')->insert([
            'loan_appl_id' => $request->loan_appl_id,
            'user_id' => $borrower_id,
            'created_at' => $current_datentime
        ]);

        DB::table('bank_acs')->insert([
            'acc_owner_id' => $borrower_id,
            'acc_no' => $request->acc_no,
            'created_at' => $current_datentime
        ]);

        DB::table('job_details')->insert([
            'job_holder_id' => $borrower_id,
            'annual_income' => $request->annual_income,
            'created_at' => $current_datentime
        ]);

        return redirect()->back()->with('msgpassed', 'New borrower profile created.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Borrowers  $borrowers
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $borrower = DB::table('borrowers')
        ->join('job_details', 'borrowers.id', '=', 'job_details.job_holder_id')
        ->join('bank_acs', 'borrowers.id', '=', 'bank_acs.acc_owner_id')
        ->join('loan_appls', 'borrowers.id', '=', 'loan_appls.user_id')
        ->select('borrowers.*', 'loan_appls.loan_appl_id', 'job_details.annual_income', 'bank_acs.acc_no')
        ->where('borrowers.id', $id)
        ->first();

        return response()->json($borrower, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Borrowers  $borrowers
     * @return \Illuminate\Http\Response
     */
    public function edit ($borrowers) //(Borrowers $id)
    {
        //$borrowers = Borrowers::where('id', $id)->first();
        
        $borrowers = DB::table('borrowers')
        ->join('job_details', 'borrowers.id', '=', 'job_details.job_holder_id')
        ->join('bank_acs', 'borrowers.id', '=', 'bank_acs.acc_owner_id')
        ->join('loan_appls', 'borrowers.id', '=', 'loan_appls.user_id')
        ->select('borrowers.*', 'loan_appls.loan_appl_id', 'job_details.annual_income', 'bank_acs.acc_no')
        ->where('borrowers.id', $borrowers)
        ->first();
        // ->get();

        
        return view('editprofile', compact('borrowers')); // editprofile.blade.php
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBorrowersRequest  $request
     * @param  \App\Models\Borrowers  $borrowers
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBorrowersRequest $request, Borrowers $borrowers)
    {
        
        if(($request->get('annual_income') == "0") && ($request->get('is_employed') == "1")) {
            return redirect()->back()->with('msgpassed', "Annual income must be specified if borrower has a job!");
        }

        if(($request->get('acc_no') == "0") && ($request->get('has_bank') == "1")) {
            return redirect()->back()->with('msgpassed', "Account number must be specified if borrower has a bank account!");
        }

        if(($request->get('is_employed') == null) || ($request->get('is_employed') === 0)) { 
            $request->is_employed = 0;
            $request->annual_income = 0;
        }
        else {
            $request->is_employed = 1;
        }
        
        if(($request->get('has_bank') == null) || ($request->get('has_bank') === 0)) { 
            $request->has_bank = 0;
            $request->acc_no = 0;
        }
        else {
            $request->has_bank = 1;
        }

        $current_datentime = date('Y-m-d H:i:s'); // I decided to skip Carbon\Carbon::now() and use PHP

        DB::table('borrowers')
        ->where('id', $request->id)
        ->update([
            //'id' => $borrower_id, updating this field is not allowed as it is used both for db and for reference
            'b_name' => $request->b_name,
            'is_employed' => $request->is_employed,
            'has_bank' => $request->has_bank,
            'updated_at' => $current_datentime
        ]);

        DB::table('loan_appls')
        ->where('user_id', $request->id)
        ->update([
            'loan_appl_id' => $request->loan_appl_id,
            //'user_id' => $borrower_id,
            'updated_at' => $current_datentime
        ]);

        DB::table('bank_acs')
        ->where('acc_owner_id', $request->id)
        ->update([
            // 'acc_owner_id' => $borrower_id,
            'acc_no' => $request->acc_no,
            'updated_at' => $current_datentime
        ]);

        DB::table('job_details')
        ->where('job_holder_id', $request->id)
        ->update([
            // 'job_holder_id' => $borrower_id,
            'annual_income' => $request->annual_income,
            'updated_at' => $current_datentime
        ]);

        // $debugThis = print_r($request, true);

        return redirect()->back()->with('msgpassed', "Borrower profile updated.");
        /*
        # Alternative method using factory
        use Illuminate\Support\Facades\DB;
 
        $affected = DB::update(
            'update with SQL query statement',
            ['data']
        );
        */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Borrowers  $borrowers
     * @return \Illuminate\Http\Response
     */
    public function destroy(UpdateBorrowersRequest $request, Borrowers $borrowers)
    {
        DB::table('borrowers')
        ->where('id', $request->id)
        ->delete();
        
        DB::table('loan_appls')
        ->where('user_id', $request->id)
        ->delete();

        DB::table('bank_acs')
        ->where('acc_owner_id', $request->id)
        ->delete();

        DB::table('job_details')
        ->where('job_holder_id', $request->id)
        ->delete();

        // deleteditems table
        $current_datentime = date('Y-m-d H:i:s');

        DB::table('deleteditems')->insert([
            'deleteditem_id' => $request->id,
            'created_at' => $current_datentime
        ]);

        return redirect()->back()->with('msgpassed', "Borrower profile $request->id deleted.");

    }
}
