<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function register_new_user()
    {
        $response = $this->post('/api/registration', [
            'name' => 'Constantin Druc',
            'email' => 'druc@pinsmile.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'device_name' => 'iphone'
        ]);

        $response->assertSuccessful();
        $this->assertNotEmpty($response->getContent());
        $this->assertDatabaseHas('users', ['email' => 'druc@pinsmile.com']);
        $this->assertDatabaseHas('personal_access_tokens', ['name' => 'iphone']);
    }
}
