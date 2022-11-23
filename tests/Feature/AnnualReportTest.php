<?php

namespace Tests\Feature;

use App\Models\BankAccount;
use App\Models\Borrower;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class AnnualReportTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Artisan::call('passport:install');
    }
    
    /**
     * Authenticate user.
     *
     * @return void
     */
    protected function authenticate()
    {
        $user = User::create([
            'name' => 'test',
            'email' => 'test@email.com',
            'password' => bcrypt('s3cret'),
        ]);

        if (!auth()->attempt(['email'=>$user->email, 'password'=>'s3cret'])) {
            return response(['message' => 'Login credentials are invaild']);
        }

        return $accessToken = auth()->user()->createToken('authToken')->accessToken;
    }
    
    /** @test*/
    public function it_reports_the_total_annual_incomes_by_year()
    {
        $token = $this->authenticate();
        
        $this->seed();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $token,
        ])->json('GET','api/total-annual-income');

        $response->assertStatus(200);
    }
}
