<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    /** @use HasFactory<\Database\Factories\WalletFactory> */
    use HasFactory;

    protected $fillable = [
        'wallet_address',
        'amount',
        'owner_id',
        'system_manager_id',
    ];

    public function owner()
    {
        return $this->belongsTo(WalletOwner::class);
    }

}
