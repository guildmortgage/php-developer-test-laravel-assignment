<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

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
}