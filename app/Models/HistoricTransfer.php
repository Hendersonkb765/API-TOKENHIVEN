<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoricTransfer extends Model
{
    /** @use HasFactory<\Database\Factories\HistoricTransferFactory> */
    use HasFactory;

    protected $fillable = [
        'from_wallet_id',
        'to_wallet_id',
        'amount',
        'system_manager_id',
        'from_wallet_owner_name',
        'to_wallet_owner_name'
    ];

    public function fromWallet(){
        return $this->belongsTo(Wallet::class,'from_wallet_id');
    }
    public function toWallet(){
        return $this->belongsTo(Wallet::class,'to_wallet_id');
    }
}
