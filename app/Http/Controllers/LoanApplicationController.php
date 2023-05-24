<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LoanApplicationController extends Controller
{
	public function getTotals($id)
	{
		$results = DB::table('loan_applications')
			->join('borrowers', 'loan_applications.id', '=', 'borrowers.loan_application_id')
			->where('loan_applications.id', $id)
			->selectRaw('SUM(borrowers.annual_salary) as total_annual_income, SUM(borrowers.total_bank_balance) as total_bank_account_value')
			->first();

		return response()->json($results);
	}

	public function getAnnualIncome($id)
	{
		$totalAnnualIncome = DB::table('loan_applications')
			->join('borrowers', 'loan_applications.id', '=', 'borrowers.loan_application_id')
			->where('loan_applications.id', $id)
			->sum('borrowers.annual_salary');

		return response()->json(['total_annual_income' => $totalAnnualIncome]);
	}

	public function getBankAccountValue($id)
	{
		$totalBankAccountValue = DB::table('loan_applications')
			->join('borrowers', 'loan_applications.id', '=', 'borrowers.loan_application_id')
			->where('loan_applications.id', $id)
			->sum('borrowers.total_bank_balance');

		return response()->json(['total_bank_account_value' => $totalBankAccountValue]);
	}

	public function addLoanApplication(Request $request)
	{
		// Retrieve the necessary data from the request
		$loanData = $request->input('loan');
		$borrowersData = $request->input('borrowers');

		// Create a new loan application
		$loanId = DB::table('loan_applications')->insertGetId([
			'loan_amount' => $loanData['loan_amount'],
			'created_at' => now(),
			'updated_at' => now(),
		]);

		// Create borrowers and associate them with the loan application
		foreach ($borrowersData as $borrowerData) {
			$borrowerData['loan_application_id'] = $loanId;
			$borrowerData['middle_name'] = $borrowerData['middle_name'] ?? null;
			$borrowerData['total_bank_balance'] = $borrowerData['total_bank_balance'] ?? null;
			$borrowerData['annual_salary'] = $borrowerData['annual_salary'] ?? null;

			DB::table('borrowers')->insert([
				'first_name' => $borrowerData['first_name'],
				'last_name' => $borrowerData['last_name'],
				'middle_name' => $borrowerData['middle_name'],
				'annual_salary' => $borrowerData['annual_salary'],
				'total_bank_balance' => $borrowerData['total_bank_balance'],
				'loan_application_id' => $borrowerData['loan_application_id'],
				'created_at' => now(),
				'updated_at' => now(),
			]);
		}

		// Return a response indicating success
		return response()->json(['message' => 'Loan application created with borrowers']);
	}
}
