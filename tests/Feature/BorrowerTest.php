<?php

namespace Tests\Feature;

use App\Models\Borrower;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class BorrowerTest extends TestCase
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
    public function it_creates_a_borrower()
    {
        $token = $this->authenticate();
        
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $token,
        ])->json('POST','api/borrower',[
            'name' => 'John Doe',
            'email' => 'john@email.com'
        ]);

        $response->assertStatus(200)
            ->assertJson([
                "message" => "Borrower created successfully"
            ]);
    }

    /** @test */
    public function it_updates_a_borrower()
    {
        $token = $this->authenticate();

        Borrower::factory()->create();
        
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $token,
        ])->json('PUT','api/borrower/1',[
            'name' => 'John Doe',
            'email' => 'john@email.com'
        ]);

        $response->assertStatus(200)
            ->assertJson([
                "message" => "Borrower updated successfully"
            ]);
    }

    /** @test*/
    public function it_finds_a_borrower()
    {
        $token = $this->authenticate();
        
        Borrower::factory()->create();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $token,
        ])->json('GET','api/borrower/1');

        $response->assertStatus(200);
    }

    /** @test*/
    public function it_finds_all_borrowers()
    {
        $token = $this->authenticate();
        
        Borrower::factory()->create();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $token,
        ])->json('GET','api/borrower');

        $response->assertStatus(200);
    }

    /** @test*/
    public function it_deletes_a_borrower()
    {
        $token = $this->authenticate();
        
        Borrower::factory()->create();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $token,
        ])->json('DELETE','api/borrower/1');

        $response->assertStatus(200)
        ->assertJson([
            "message" => "Borrower deleted successfully"
        ]);
    }
}
