<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Wallet;
class filterWalletTest extends TestCase
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

        Wallet::factory(1)->create([
            'amount' => 100,
            'system_manager_id' => $this->userId

        ]);
        Wallet::factory(20)->create([

            'system_manager_id' => $this->userId
        ]);
   
    }

    public function test_filtering_wallet_with_amount_greater_than_or_equal_to_100(): void
    {
        
        $response = $this->get(route('historicTransfer.index','?eq=100'),[
            'Authorization' => "Bearer $this->token"
        ]);
        $response->assertStatus(200);
    }
}
