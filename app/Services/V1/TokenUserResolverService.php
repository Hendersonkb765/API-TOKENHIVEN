<?php

namespace App\Services\V1;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Support\Str;
use App\Models\User;
use App\Exceptions\TokenNotFoundException;
class TokenUserResolverService{

    public function getUser(Request $request): User{

        $authorizationHeader = $request->header('Authorization');
        $token = PersonalAccessToken::findToken(Str::after($authorizationHeader  , 'Bearer '));
        $user = $token->tokenable;
        if(!$user){
            throw new TokenNotFoundException();
        }
        return $user;
    }
}


