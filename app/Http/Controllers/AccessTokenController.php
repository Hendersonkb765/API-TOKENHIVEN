<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\request\StoreAccessTokenRequest;

class AccessTokenController extends Controller
{
    public function index(){
        
        $user = Auth::user();
    
        return response()->json([
            'status'=>200,
            'tokens'=>$user->tokens
        ]);
        
    }
    public function store(Request $request){
        $user = Auth::user();
        
        $token = $user->createToken($request->tokenName);

        return response()->json([
            'status'=>200,
            'token' => $token->plainTextToken,
            
        ]);
    }
    public function destroy( $token){
        
        $token->delete();
        return response()->json([
            'status'=>200,
            'message'=>'Token deleted'
        ]);
    }
}
