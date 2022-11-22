<?php

namespace Tests\Feature;

use App\Models\User;
use Laravel\Passport\Passport;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Artisan::call('passport:install');
    }

    /** @test */
    public function it_requires_email_and_login()
    {
        $this->json('POST', 'api/login')
            ->assertJson([
                'error' => [
                    'email' => ['The email field is required.'],
                    'password' => ['The password field is required.']
                ],
                'status' => 422
            ]);
    }

    /** @test */
    public function it_requires_valid_email_and_password_login()
    {
        $data = ['email' => 'tester@email.com', 'password' => 's3cretpwd'];

        $this->json('POST', 'api/login', $data)
            ->assertJson([
                'message' => "Login credentials are invaild"
            ]);
    }

    /** @test */
    public function user_register_successfully()
    {
        $response = $this->json('POST', '/api/register', [
            'name'  =>  $name = 'Test',
            'email'  =>  $email = 'test@example.com',
            'password'  =>  $password = 's3cret',
        ]);

        $response->assertStatus(200);

        // Receive our token
        $this->assertArrayHasKey('access_token',$response->json());

    }

    /** @test */
    public function user_logins_successfully()
    {
        $response = $this->json('POST', '/api/register', [
            'name'  =>  $name = 'Test',
            'email'  =>  $email = 'test@example.com',
            'password'  =>  $password = 's3cret',
        ]);

        $response = $this->json('POST','api/login',[
            'email' => $email,
            'password' => $password,
        ]);

        $response->assertStatus(200);
        
        $this->assertArrayHasKey('access_token',$response->json());

    }
}
