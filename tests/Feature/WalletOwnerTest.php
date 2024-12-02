<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\WalletOwner;
use Tests\TestCase;

class WalletOwnerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    protected $token = '12|fjztor2uhOmHzLP56HaDfiRWNbja5ZTbNRl7A0mV99da71dc';
    public function test_create_wallet_owner(): void
    { 
        $emailRandom= rand(1, 1000000);
        $response = $this->withHeaders([
            'Authorization'=> "Bearer $this->token"
            ])
        ->post('api/v1/walletsowner', [
            "name"=> "Henderson gomes",
            "email"=> "heooodasjkl$emailRandom@outlook.com.br"
        ]);
        $response->assertStatus(201);
        $response->assertJsonStructure([
            'message',
            'status',
            'data'
        ]);
    }
    public function test_get_all_wallet_owner(): void
    {
        $response = $this->withHeaders([
            'Authorization'=> "Bearer $this->token"
            ])
        ->get('api/v1/walletsowner');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'message',
            'status',
            'data'
        ]);
        
    }
    public function test_get_wallet_owner(): void
    {
        $response = $this->withHeaders([
            'Authorization'=> "Bearer $this->token"
            ])
        ->get('api/v1/walletsowner/2');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'message',
            'status',
            'data'
        ]);
        
    }
    public function test_update_wallet_owner_data():void{
        $response = $this->withHeaders([
            'Authorization' =>"Bearer $this->token"
        ])->put('api/v1/walletsowner/2',[
            "name"=> "Henderson gomes",
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'message',
            'status',
            'data'
        ]);
    }
    public function test_delete_wallet_owner():void{

        $created = WalletOwner::create([
            'name' => 'Henderson gomes',
            'email' => 'tess@test.com',
            'system_manager_id'=> 1]);

        $response = $this->withHeaders([
            'Authorization' => "Bearer $this->token"])
            ->delete('api/v1/walletsowner/'.$created->id);
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'message',
            'status',
            'data'
        ]);
    }
  
}
