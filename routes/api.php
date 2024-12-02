<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\WalletOwnerController;
use App\Http\Controllers\Api\V1\WalletController;
use App\Http\Controllers\Api\V1\WalletTransferController;
Route::prefix('v1')->group(function(){
  
    //Route::get('/wallets',[WalletOwnerController::class,'index']);
    Route::apiResource('walletsowner', WalletOwnerController::class)->middleware('auth:sanctum');
    Route::get('wallet',[WalletController::class,'index'])->middleware('auth:sanctum');
    Route::post('wallet',[WalletController::class,'store']);
    Route::delete('wallet/{wallet}',[WalletController::class,'destroy']);

    Route::post('wallet-transfer',[WalletTransferController::class,'store']);
    Route::get('wallet-transfer',[WalletTransferController::class,'index']);

});
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
 