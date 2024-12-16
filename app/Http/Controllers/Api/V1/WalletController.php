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
use App\Filters\WalletFilter;
use App\Services\V1\TokenUserResolverService;
use App\Repositories\BaseRepository;
class WalletController extends Controller
{
    use HttpResponses;


    public function index(Request $request)
    {
        try{
            $queryFilter = (new WalletFilter())->filter($request);
            $userId = (new TokenUserResolverService())->getUser($request)->id;
            $wallets = (new BaseRepository(new Wallet(),$userId))->all($queryFilter);
            
            return $this->success('ok',200,WalletResource::collection($wallets));
            
        }
        catch(\QueryException $e){
            Log::error('Error QueryException'.$e->getMessage());

            return $this->error('An error occurred while trying to get the wallet list',500);

        }
        catch(\Exception $e){
            Log::error('Error:'.$e->getMessage());

            return $this->error($e->getMessage(),500);
        }
        
    }


    public function store(Request $request)
    {
        try{
            $userId = (new TokenUserResolverService())->getUser($request)->id;

            $wallet = (new BaseRepository(new Wallet,$userId))->create([
                'wallet_address'=>Hash::make(now()),
                'amount'=>$request->amount,
            ]);
           
            return $this->success('Wallet created successfully',201,new WalletResource($wallet));
            
        }
        catch(\QueryException $e){
            Log::error('Error QueryException'.$e->getMessage());
            return $this->error('An error occurred while trying to create the wallet',500);
        }
        catch(\Exception $e){
            Log::error('Error:'.$e->getMessage());
            return $this->error($e->getMessage(),500);
        }
            
    }
    public function show(Request $request ,Wallet $wallet)
    {
        try{
            $userId = (new TokenUserResolverService())->getUser($request)->id;
            $wallet = (new BaseRepository($wallet,$userId))->show($wallet);
            return $this->success('ok',200,new WalletResource($wallet));
        }
        catch(\QueryException $e){
            Log::error('Error QueryException'.$e->getMessage());
            return $this->error('An error occurred while trying to get the wallet',500);
        }
        catch(\Exception $e){
            Log::error('Error:'.$e->getMessage());
            return $this->error($e->getMessage(),500);
        }
        
    }


    public function destroy(Request $request,Wallet $wallet)
    {
        try{
            $userId = (new TokenUserResolverService())->getUser($request)->id;
            (new BaseRepository($wallet,$userId))->delete($wallet);
            $wallet->delete();
            return $this->success('Wallet deleted successfully',200);
        }
        catch(\QueryException $e){
            Log::error('Error QueryException'.$e->getMessage());
            return $this->error('An error occurred while trying to delete the wallet',500);
        }
        catch(\Exception $e){
            Log::error('Error:'.$e->getMessage());
            return $this->error($e->getMessage(),500);
        }
        
    }
}
