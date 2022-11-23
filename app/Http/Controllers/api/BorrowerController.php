<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BorrowerCollection;
use App\Http\Resources\BorrowerResource;
use App\Models\Borrower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BorrowerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(new BorrowerCollection(Borrower::paginate()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|max:80',
            'email' => 'required|email|unique:borrowers',
        ]);

        if($validator->fails()){
            return response(['error' => $validator->errors(), 'message' => 'Validation Error']);
        }

        $borrower = Borrower::create($data);

        return response(['Borrower' => new BorrowerResource($borrower), 'message' => 'Borrower created successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Borrower  $borrower
     * @return \Illuminate\Http\Response
     */
    public function show(Borrower $borrower)
    {
        return response(['borrower' => new BorrowerResource($borrower)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Borrower  $borrower
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Borrower $borrower)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|max:80',
            'email' => 'required|email|unique:borrowers',
        ]);

        if($validator->fails()){
            return response(['error' => $validator->errors(), 'message' => 'Validation Error']);
        }

        $borrower->update($data);

        return response(['product' => new BorrowerResource($borrower), 'message' => 'Borrower updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Borrower  $borrower
     * @return \Illuminate\Http\Response
     */
    public function destroy(Borrower $borrower)
    {
        $borrower->delete();

        return response(['message' => 'Borrower deleted successfully']);
    }
}
