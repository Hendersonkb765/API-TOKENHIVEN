<?php 

namespace App\Filters;

class WalletFilter extends Filter{

    protected array $allowedOperatorsFields =[
        'wallet_address'=>['eq','ne'],
        'amount'=>['eq','gt','lt','gte','lte','ne','in'],
        'created_at'=>['eq','gt','lt','gte','lte','ne','in']
    ];
}