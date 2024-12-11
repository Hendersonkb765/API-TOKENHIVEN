<?php

namespace App\Services\V1;

use App\Models\Wallet;
use App\Models\HistoricTransfer;
use App\Repositories\BaseRepository;
use App\Services\V1\TokenUserResolverService;
use Illuminate\Database\Eloquent\Model;

abstract class TransactionHistoryService{

    public function recordTransaction(Model $from,Model $to, int $amount,int $userId){

        
  

    }
}