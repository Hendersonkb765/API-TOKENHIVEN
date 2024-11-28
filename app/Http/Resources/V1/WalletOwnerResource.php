<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WalletOwnerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        \Log::info('wallet:',['wallet'=>$this->wallet]);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'walletBalance' =>empty($this->wallet->amount)?null : $this->wallet->amount,
        ];
    }
}
