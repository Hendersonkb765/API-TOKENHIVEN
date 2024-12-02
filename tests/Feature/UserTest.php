<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_user_registration_creates_new_user(): void
    {
        $response = $this->get('/');


        $response->assertStatus(200);
    }
    public function test_registred_user(): void
    {
        $response = $this->post(route('users.store'));

        $response->assertStatus(302);
    }
}
