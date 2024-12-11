<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Wallet;
use Illuminate\Http\Request;
use App\Services\V1\TokenUserResolverService;
class WalletOwner extends Model
{
    /** @use HasFactory<\Database\Factories\WalletOwnerFactory> */
    use HasFactory ;

    protected $fillable = ['name', 'email', 'system_manager_id'];

    public function wallet()
    {
        return $this->hasOne(Wallet::class, 'owner_id');
    }

   
}
