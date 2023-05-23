<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoanApplicationControllerTest extends TestCase
{
	use DatabaseMigrations;
	use RefreshDatabase;

	public function testGetTotals()
	{
		$loanApplicationId = 2;
		// Create a loan application with borrowers
		\App\Models\LoanApplication::factory()->create([
			'id' => $loanApplicationId,
			'loan_amount' => 100000
		]);

		\App\Models\Borrower::factory()->create([
			'first_name' => 'John',
			'last_name' => 'Doe',
			'middle_name' => 'Smith',
			'annual_salary' => 50000,
			'total_bank_balance' => 100000,
			'loan_application_id' => $loanApplicationId,
		]);

		\App\Models\Borrower::factory()->create([
			'first_name' => 'Jane',
			'last_name' => 'Smith',
			'middle_name' => null,
			'total_bank_balance' => null,
			'loan_application_id' => $loanApplicationId,
			'annual_salary' => 50000,
		]);

		// Perform the GET request to the API endpoint
		$response = $this->get('/api/loan-applications/' . $loanApplicationId . '/totals');

		// Assert the response status code
		$response->assertStatus(200);

		// Assert the response JSON structure and values
		$response->assertJsonStructure([
			'total_annual_income',
			'total_bank_account_value'
		])->assertJson([
			'total_annual_income' => 100000, // Replace with the expected total annual income
			'total_bank_account_value' => 100000 // Replace with the expected total bank account value
		]);
	}
}
