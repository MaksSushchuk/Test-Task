<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Factories\Factory;
class LoginControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testIndexMethod(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function testStoreMethod(): void
    {
        $credentials = [
            'email' => 'admin@admin.com',
            'password' => 'password',
        ];

        $response = $this->post('/login',$credentials);
        $this->assertAuthenticated();
        $response->assertRedirect(route('admin.home')); 
    }

}
