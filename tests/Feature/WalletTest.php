<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Wallet;
class WalletTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_display_all_wallets(): void
    {
        $user = User::factory()->create();
        
        $response = $this->get('/api/v1/wallets',['Authorization' => 'Bearer '.$user->createToken('my-app-token  ')->plainTextToken]);
        
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'status',
            'data',
        ]);
    }
    public function test_register_wallet(){
        $user = User::factory()->create();    
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$user->createToken('my-app-token')->plainTextToken,
        ])->post('/api/v1/wallets',['ownerId'=>3]);

        $response->assertStatus(201);
        $response->assertJsonStructure([
            'status',
            'data',
        ]);
    }
    public function test_display_wallet_by_id(){
        $user = User::factory()->create();
        $wallet = Wallet::factory()->create([
            'system_manager_id'=>$user->id
        ]);    ;    
        $response = $this->withHeaders(['Authorization' => 'Bearer '.$user->createToken('my-app-token')->plainTextToken])
        ->get('/api/v1/wallets/'.$wallet->id);
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'status',
            'data',
        ]);
    }
    public function test_delete_wallet(){
        $user = User::factory()->create();
        $wallet = Wallet::factory()->create([
            'system_manager_id'=>$user->id
        ]);    
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $user->createToken('my-app-token')->plainTextToken
        ])->delete('/api/v1/wallets/'.$wallet->id);
        $response->assertStatus(200);
        
    }
}
