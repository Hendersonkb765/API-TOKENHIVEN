<?php 

namespace App\Services;
use App\Models\Wallet;
class WalletTransferService extends TransactionHistory{

    public function transfer(string $from, string $to, float|int $amount){

        
        $from = Wallet::where('wallet_address',$from)->first();
        $to = Wallet::where('wallet_address',$to)->first();
        $from->amount -= $amount;
        $to->amount += $amount;
        $from->save();
        $to->save();
        $this->recordTransaction($from->id,$to->id,$amount);

    }
}
