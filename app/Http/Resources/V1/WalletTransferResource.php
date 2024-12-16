<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Wallet;
class WalletTransferResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $sendByWallet = Wallet::find($this->from_wallet_id);
        $receovedByWallet = Wallet::find($this->to_wallet_id);
        return [
            'amount'=> $this->amount,
            'sendBy'=> [
                            'id'=> $this->id,
                            'Address'=> $this->fromWallet->wallet_address                     
            ],
            'receivedBy'=>[
                            'id'=> $receovedByWallet->id,
                            'Address'=> $this->toWallet->wallet_address    
            ]
        ];
    }
}
