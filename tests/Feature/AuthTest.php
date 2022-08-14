<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_success()
    {
        $response = $this->post('/api/register', [
            'name' => 'jack',
            'email' => 'jack@gmail.com',
            'password' => 12345678
        ]);
        $response->assertStatus(200);
    }
}
