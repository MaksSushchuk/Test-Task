<?php

namespace Tests\Feature\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class LocaleControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testChangeLocaleMethod(): void
    {

        $locale = 'uk';
        $response = $this->get(route('locale', ['lang' => $locale]));

        $response->assertStatus(302);
        $this->assertEquals($locale, Session::get('locale'));
        $response->assertStatus(302);
    }
}
