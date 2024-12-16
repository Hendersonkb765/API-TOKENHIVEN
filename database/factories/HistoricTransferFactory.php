<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Wallet;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HistoricTransfer>
 */
class HistoricTransferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fromWallet = Wallet::inRandomOrder()->first();
        $toWallet = Wallet::inRandomOrder()->first();
        return [
            'amount'=> $this->faker->numberBetween(100, 10000),
            'from_wallet_id'=> $fromWallet->id,
            'to_wallet_id'=>$toWallet->id,
            'system_manager_id' =>1,
        ];
    }
}
