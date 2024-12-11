<?php

namespace App\Filters;

class HistoricTransferFilter extends Filter{

    protected array $allowedOperatorsFields = [
        'amount'=>['gt','eq','lt','gte','lte','ne','in'],
        'from_wallet_owner_name'=>['eq'],
        'to_wallet_owner_name'=>['eq'],
    ];


}

?>