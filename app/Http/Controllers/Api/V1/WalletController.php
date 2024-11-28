<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Models\Wallet;
use App\Traits\HttpResponses;
use App\Http\Requests\StoreWalletRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\WalletResource;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
class WalletController extends Controller
{
    use HttpResponses;
    public function index()
    {
        try{


            return $this->success('ok',200,WalletResource::collection(Wallet::all()));
            
        }
        catch(\QueryException $e){
            Log::error('Error QueryException'.$e->getMessage());

            return $this->error('An error occurred while trying to get the wallet list',500);

        }
        catch(\Exception $e){
            Log::error('Error:'.$e->getMessage());

            return $this->error('An unexpected error occurred. Please contact support if the problem persists.',500);
        }
        
    }


    public function store(StoreWalletRequest $request)
    {
        try{
            $request = $request->validated();
            $wallet = Wallet::create([
                'wallet_address'=>Hash::make(now()),
                'amount'=>0,
                'owner_id'=>$request['owner_id'],
                'system_manager_id'=>1,

            ]);
            return $this->success('Wallet created successfully',201,new WalletResource($wallet));
            
        }
        catch(\QueryException $e){
            Log::error('Error QueryException'.$e->getMessage());
            return $this->error('An error occurred while trying to create the wallet',500);
        }
        catch(\Exception $e){
            Log::error('Error:'.$e->getMessage());
            return $this->error('An unexpected error occurred. Please contact support if the problem persists.',500);
        }
            
    }


    public function destroy(Wallet $wallet)
    {
        try{
            $wallet->delete();
            return $this->success('Wallet deleted successfully',200);
        }
        catch(\QueryException $e){
            Log::error('Error QueryException'.$e->getMessage());
            return $this->error('An error occurred while trying to delete the wallet',500);
        }
        catch(\Exception $e){
            Log::error('Error:'.$e->getMessage());
            return $this->error('An unexpected error occurred. Please contact support if the problem persists.',500);
        }
        
    }
}
