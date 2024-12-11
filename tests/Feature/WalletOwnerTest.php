<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use App\Models\WalletOwner;
use Tests\TestCase;
use App\Models\User;


class WalletOwnerTest extends TestCase
{

    /**
     * A basic feature test example.
     */
    protected $token;
    protected $userId;
    public function setUp():void{
        parent::setUp();
        $user = User::factory()->create();
        $this->token = $user->createToken('my-app-token')->plainTextToken;
        $this->userId = $user->id;
    }
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
        WalletOwner::factory(20)->create([
            'system_manager_id'=> $this->userId
        ]);
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
        $created = WalletOwner::factory(1)->create([
            'system_manager_id'=> $this->userId
        ]);

        $response = $this->withHeaders([
            'Authorization'=> "Bearer $this->token"
            ])
        ->get('api/v1/walletsowner/'.$created->first()->id);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'message',
            'status',
            'data'
        ]);
        
    }
    public function test_update_wallet_owner_data():void{

        $created = WalletOwner::factory()->create(['system_manager_id'=>$this->userId]);
        $response = $this->withHeaders([
            'Authorization' =>"Bearer $this->token"
        ])->put('api/v1/walletsowner/'.$created->id,[
            "name"=> "Henderson gomes"

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
            'email' => 'tesss@test.com',
            'system_manager_id'=> $this->userId]);

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
