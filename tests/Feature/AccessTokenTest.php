<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class AccessTokenTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    //php artisan test --filter AccessTokenTest

    
    public function test_create_authenticated_user_tokens(): void
    {
        Auth::loginUsingId(1);
        $response = $this->post(route('accessTokens.store'),[
            'tokenName'=>'Token teste'
        ]);
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'status',
            'token'
        ]);
        echo $response->getContent();
    }
    public function test_show_all_tokens(): void
    {
        Auth::loginUsingId(1);
        $response = $this->get(route('accessTokens.index'));
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'status',
            'tokens'
        ]);
    }
    
}
