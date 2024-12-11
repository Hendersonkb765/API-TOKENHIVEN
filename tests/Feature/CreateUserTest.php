<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
class CreateUserTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $user = User::factory()->create();
        $token = $user->createToken('my-app-token')->plainTextToken;
        $userId = $user->id;
        dd($token);
        $response->assertStatus(200);
    }
}
