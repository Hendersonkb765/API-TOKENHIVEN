<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Wallet;
class HistoricTransferTest extends TestCase
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
    public function test_display_full_transfer_history(): void
    {
        $response = $this->get(route('historicTransfer.index'),['Authorization' => "Bearer $this->token"]);
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'status',
            'data'
            ]);
    }
    public function test_make_a_transfer_from_one_wallet_to_another(){
        $wallet1 = Wallet::factory(1)->create([
            'system_manager_id' => $this->userId
        ])->first();
        $wallet2 = Wallet::factory(1)->create([
            'system_manager_id' => $this->userId
        ])->first();
      
        $response = $this->withHeaders(['Authorization'=> "Bearer $this->token"])
        ->post(route('historicTransfer.store',[
            'from'=>$wallet1->wallet_address,
            'to'=> $wallet2->wallet_address,
            'amount'=>2
        ]));
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'status',
            'data'
        ]);
    }
    
}
