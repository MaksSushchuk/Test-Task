<?php

namespace Tests\Feature\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class CompanyControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testIndexMethod(): void
    {
        $user = User::factory()->make();
        $this->actingAs($user);

        $response = $this->get('/admin/home');

        $response->assertStatus(200);
        $response->assertViewIs('admin.home');
    }

    public function testCreateMethod(): void {
        $user = User::factory()->make();
        $this->actingAs($user);
        $response = $this->get('admin/home/company/create');

        $response->assertStatus(200);
        $response->assertViewIs('company.create');
    }

    public function testStoreMethod(): void {
        $user = User::factory()->make();
        $this->actingAs($user);
    
        $data = [
            'name' => 'Company',
            'email' => 'company@company.com',
            'logo' => 'file.jpeg',
            'website' => 'http://sgsg.com',
        ];
    
    
        $response = $this->post('admin/home', $data);
    
        $response->assertStatus(302);
    }
    

}
