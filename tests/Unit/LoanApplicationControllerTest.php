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


	public function testAddLoanApplicationWithBorrowers()
	{
		// Prepare the request payload
		$requestData = [
			'loan' => [
				'loan_amount' => 10000
			],
			'borrowers' => [
				[
					'first_name' => 'Jason',
					'last_name' => 'Jones',
					'middle_name' => null,
					'annual_salary' => 50000,
					'total_bank_balance' => 10000
				],
				[
					'first_name' => 'Jane',
					'last_name' => 'Jones',
					'middle_name' => null,
					'annual_salary' => 50000,
					'total_bank_balance' => null
				]
			]
		];

		// Send a POST request to the API route
		$response = $this->post('/api/loan-applications/add', $requestData);

		// Assert the response status code
		$response->assertStatus(200);

		// Assert the response JSON structure
		$response->assertJson([
			'message' => 'Loan application created with borrowers'
		]);

		// Assert the database records
		$this->assertDatabaseHas('loan_applications', [
			'loan_amount' => 10000
		]);

		$this->assertDatabaseHas('borrowers', [
			'first_name' => 'Jason',
			'last_name' => 'Jones',
			'middle_name' => null,
			'annual_salary' => 50000,
			'total_bank_balance' => 10000
		]);

		$this->assertDatabaseHas('borrowers', [
			'first_name' => 'Jane',
			'last_name' => 'Jones',
			'middle_name' => null,
			'annual_salary' => 50000,
			'total_bank_balance' => null
		]);
	}
}
