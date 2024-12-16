<?php 

namespace App\Services\V1;
use App\Models\Wallet;
use App\Services\V1\TokenUserResolverService;
use App\Services\V1\TransactionHistoryService;
use App\Models\HistoricTransfer;
use App\Repositories\BaseRepository;
class WalletTransferService extends TransactionHistoryService{

    public function transfer(string $from, string $to, float|int $amount, int $userId){

        
        $from = Wallet::where('wallet_address',$from)->first();
        $to = Wallet::where('wallet_address',$to)->first();
        $from->amount -= $amount;
        $to->amount += $amount;
        $from->save();
        $to->save();
        
        (new BaseRepository(new HistoricTransfer(),$userId))->create([
            'from_wallet_id' => $from->id,
            'to_wallet_id' => $to->id,
            'amount' => $amount,
            'system_manager_id' => $userId
        ]);


    }
}
