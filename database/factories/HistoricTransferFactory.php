<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\WalletOwner;
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
        return [
            'amount'=> $this->faker->numberBetween(100, 10000),
            'from_wallet_id'=> WalletOwner::factory()->create()->id,
            'to_wallet_id'=>WalletOwner::factory()->create()->id,
        ];
    }
}
