<?php 

namespace App\Filters;

class WalletOwnerFilter extends Filter{

    protected array $allowedOperatorsFields = [
        'name' => ['eq','ne','in'],
        'email' => ['eq','ne','in'],
        //'paid' => ['eq','ne'],
        //'payment_date' => ['gt','eq','lt','gte','lte','ne'],
    ];
}