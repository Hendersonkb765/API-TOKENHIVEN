<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Wallet;
use App\Models\WalletOwner;
use App\Models\HistoricTransfer;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        /*
        return [
            'wallet_address' => $this->faker->hash('sha256'),
            'amount' => $this->faker->numberBetween(100, 10000),
            'currency' => $this->faker->randomElement(['USD', 'EUR', 'GBP']),
            'owner_id' => \App\Models\WalletOwner::factory()->create()->id,
        ];

        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
        ];

        */
        User::factory()->create();
        WalletOwner::factory(5)->create();
        Wallet::factory(5)->create();
        HistoricTransfer::factory(10)->create();
    }
}
