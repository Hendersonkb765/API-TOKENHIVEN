<?php

namespace App\Services\V1;

use App\Models\Wallet;
use App\Services\V1\TokenUserResolverService;
use App\Models\WalletOwner;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
class WalletOwnerService{

    public function createWalletOwner(Request $request):Model{
       
        $user = (new TokenUserResolverService())->getUser($request);
        $validated = $request->validated();
        $walletOwner = WalletOwner::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'system_manager_id'=> $user->id
        ]);
         

        return $walletOwner;
    }

    
}

?>