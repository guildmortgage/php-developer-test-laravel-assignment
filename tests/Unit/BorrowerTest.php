<?php

namespace Tests\Feature;

use App\Models\Borrower;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BorrowerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $borrower = Borrower::create([
            "name" => "Jack",
            "hasJob" => 1,
            "hasAccount" => 0,
            "annual_income" => 0
        ]);

        $response = $this->json('GET','/api/borrower');

        $response->assertJsonFragment([
            [
                "name" => "Jack",
                "hasJob" => 1,
                "hasAccount" => 0,
                "annual_income" => 0
            ]
        ]);
    }
}
