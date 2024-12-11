<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wallet;
use App\Models\WalletOwner;
use App\Traits\HttpResponses;
use App\Http\Requests\WalletTransferRequest;
use Illuminate\Support\Facades\DB;
use App\Services\V1\WalletTransferService;
use Illuminate\Support\Facades\Log;
use App\Models\HistoricTransfer;
use App\Http\Resources\V1\WalletTransferResource;
use App\Services\V1\TokenUserResolverService;
use App\Filters\HistoricTransferFilter;
use App\Repositories\BaseRepository;


class WalletTransferController extends Controller
{
    use HttpResponses;

    protected $walletTransferService;

    public function __construct(){
        $this->walletTransferService = new WalletTransferService;    
    }

    public function index(Request $request){
   
        $queryFilter = (new HistoricTransferFilter())->filter($request);
        $userId = (new TokenUserResolverService())->getUser($request)->id;
        $historicTransfer = (new BaseRepository(new HistoricTransfer(),$userId))->all($queryFilter);

        return $this->success('ok',200,
        [
            'transferHistory'=>WalletTransferResource::collection($historicTransfer)
        ]);
    }
    public function store(WalletTransferRequest $request){

        try{
            DB::beginTransaction();
            $userId = (new TokenUserResolverService)->getUser($request)->id;
            $request = $request->validated();          
            $this->walletTransferService->transfer($request['from'],$request['to'],$request['amount'],$userId);
            
            DB::commit();
            return $this->success('Transfer successful',200);
    
        }
        catch(\Illuminate\Database\QueryException $e){
            DB::rollBack();
            Log::error('QueryException'.$e->getMessage());
            return $this->error('could not make a transfer',500);
        }
        catch(\Exception $e){
            DB::rollBack();
            Log::error('Error:'.$e->getMessage());
            return $this->error('An error occurred:'.$e->getMessage(), 500);
        }
    }
 
}
