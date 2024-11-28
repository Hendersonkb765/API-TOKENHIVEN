<?php

namespace App\Services;

use App\Models\Wallet;
use App\Models\HistoricTransfer;
abstract class TransactionHistory{

    public function recordTransaction(int $from,int $to, float|int $amount){

        HistoricTransfer::create([
            'from_wallet_id' => $from,
            'to_wallet_id' => $to,
            'amount' => $amount,
            'system_manager_id' => 1
        ]);
    }
}