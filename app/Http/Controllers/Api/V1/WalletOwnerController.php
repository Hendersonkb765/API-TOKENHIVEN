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
class WalletOwnerController extends Controller
{
    use HttpResponses;
    public function index()
    {
        try{

            $walletOwners = WalletOwner::with('wallet')->get();
            return $this->success('ok',200,WalletOwnerResource::collection($walletOwners));

        }
        catch (\QueryException $e){
            Log::error('QueryException'.$e->getMessage());
            return $this->error('An error occurred while trying to get the user list',500);
        }
        catch(\Exception $e){
            Log::error('Error:'.$e->getMessage());
            return $this->error('An unexpected error occurred. Please contact support if the problem persists.',500);
        }
        
    }

    public function store(StoreWalletOwnerRequest $request)
    {
       try{
            $validated = $request->validated();
            $walletOwner = WalletOwner::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'system_manager_id'=> 1
            ]);     
            
            return $this->success('User created successfully',201, new WalletOwnerResource($walletOwner));               
       }
       catch (\QueryException $e){
            Log::error('Error QueryException'.$e->getMessage());
            return $this->error('Error co',500);
       }
       catch(\Exception $e){
            Log::error('Error:'.$e->getMessage());
            return $this->error('An unexpected error occurred. Please contact support if the problem persists.',500);
       }
        
  
        
    }

    
    public function show(WalletOwnerResource $walletsowner)
    {
        try{
            return $this->success(200,$walletOwner);
        }
        catch (\QueryException $e){
            Log::error('Error QueryException:'.$e->getMessage());
            return $this->error('An error occurred while trying to get a user',500);
       }
        catch(\Exception $e){
            Log::error('Error:'.$e->getMessage());
            return $this->error('An unexpected error occurred. Please contact support if the problem persists.',500);
        }
    }

    
    public function update(UpdateWalletOwnerRequest $request, WalletOwner $walletsowner)
    {
        try{
            $request = $request->validated();
            
            $updated = $walletsowner->update($request);
    
            return $this->success('User updated successfully',200, new WalletOwnerResource($walletsowner));
            
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

   
    public function destroy(WalletOwner $walletsowner)
    {
        try{
            $deleted = $walletsowner->delete();
            
            return $this->success('User deleted successfully',200);
        }
        catch(\QueryException $e)
        {
            return $this->error('Error deleting user',500);

        }
        catch(\Exception $e){
            return $this->error('An unexpected error occurred. Please contact support if the problem persists.',500);
        }
        
    }
}
