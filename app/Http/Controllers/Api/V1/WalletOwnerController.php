<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WalletOwner;
use App\Traits\HttpResponses;
use App\Http\Resources\V1\WalletOwnerResource;
use App\Http\Requests\StoreWalletOwnerRequest;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\UpdateWalletOwnerRequest;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Laravel\Sanctum\PersonalAccessToken;
use App\Exceptions\TokenNotFoundException;
use App\Repositories\BaseRepository;
use App\Services\V1\TokenUserResolverService;
class WalletOwnerController extends Controller
{
    use HttpResponses;


    public function index(Request $request)
    {
        try{

            //$walletOwners = WalletOwner::with('wallet')->get();
            $userId = (new TokenUserResolverService())->getUser($request)->id;
            $walletOwners = (new BaseRepository(new WalletOwner(),$userId))->all();
            return $this->success('ok',200,WalletOwnerResource::collection($walletOwners));


        }
        catch (\QueryException $e){
            Log::error('QueryException'.$e->getMessage());
            return $this->error('An error occurred while trying to get the user list',500);
        }
        catch(\Exception $e){
            Log::error('Error:'.$e->getMessage(). 'trace'.$e->getTraceAsString());
            return $this->error('An unexpected error occurred. Please contact support if the problem persists.',500);
        }
        
    }

    public function store(StoreWalletOwnerRequest $request)
    {
       try{
            
           // $walletOwner = (new WalletOwnerService())->createWalletOwner($request);
            $userId = (new TokenUserResolverService())->getUser($request)->id;
            $walletOwner = (new BaseRepository(new WalletOwner(),$userId))->create($request->validated());
            return $this->success('User created successfully',201, new WalletOwnerResource($walletOwner));               
       }
       catch (\QueryException $e){
            Log::error('Error QueryException'.$e->getMessage());
            return $this->error('Error co',500);
       }
       catch(\Exception $e){
        Log::error('Error:'.$e->getMessage(). 'trace'.$e->getTraceAsString());
        return $this->error('An unexpected error occurred. Please contact support if the problem persists.',500);
       }
        
  
        
    }

    
    public function show(Request $request, WalletOwner $walletsowner)
    {
        try{
            $userId = (new TokenUserResolverService())->getUser($request)->id;
            $walletOwners = (new BaseRepository(new WalletOwner(),$userId))->show($walletsowner);
            return $this->success('ok',200,new WalletOwnerResource($walletOwners));
        }
        catch (\QueryException $e){
            Log::error('Error QueryException:'.$e->getMessage());
            return $this->error('An error occurred while trying to get a user',500);
       }
        catch(\Exception $e){

            Log::error('Error:'.$e->getMessage(). 'trace'.$e->getTraceAsString());
            return $this->error('An unexpected error occurred. Please contact support if the problem persists.',500);
        }
    }

    
    public function update(UpdateWalletOwnerRequest $request, WalletOwner $walletsowner)
    {
        try{
            $userId = (new TokenUserResolverService())->getUser($request)->id;
            $request = $request->validated();
            (new BaseRepository(new WalletOwner(),$userId))->update($request,$walletsowner); //$walletsowner->update($request);
            return $this->success('User updated successfully',200, new WalletOwnerResource($walletsowner->refresh()));
            
        }
        catch(\QueryException $e)
        {
            Log::error('Error QueryException:'.$e->getMessage());
            return $this->error('Error updating user',500);

        }
        catch(\Exception $e){
            Log::error('Error:'.$e->getMessage(). 'trace'.$e->getTraceAsString());
            return $this->error('An unexpected error occurred. Please contact support if the problem persists.',500);
        }
        

    }

   
    public function destroy(Request $request ,WalletOwner $walletsowner)
    {
        try{
            $userId = (new TokenUserResolverService())->getUser($request)->id;
            (new BaseRepository(new WalletOwner(),$userId))->delete($walletsowner);
            
            return $this->success('User deleted successfully',200);
        }
        catch(\QueryException $e)
        {
            Log::error('Error QueryException:'.$e->getMessage());

            return $this->error('Error deleting user',500);

        }
        catch(\Exception $e){
            Log::error('Error:'.$e->getMessage(). 'trace'.$e->getTraceAsString());

            return $this->error('An unexpected error occurred. Please contact support if the problem persists.',500);
        }
        
    }
}
