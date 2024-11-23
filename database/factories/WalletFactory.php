<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\WalletOwner;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Wallet>
 */
class WalletFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'wallet_address' => $this->faker->hash('sha256'),
            'amount' => $this->faker->numberBetween(100, 10000),
            'currency' => $this->faker->randomElement(['USD', 'EUR', 'GBP']),
            'owner_id' => \App\Models\WalletOwner::factory()->create()->id,
        ];
    }
}
