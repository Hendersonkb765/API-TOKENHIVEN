<?php 

namespace App\Filters;
use Illuminate\Http\Request;
use Exception;
abstract class Filter{
    protected array $allowedOperatorsFields = [];

    protected array $transalateOperatorsFields = [
        'gt' => '>',
        'eq' => '=',
        'lt' => '<',
        'gte' => '>=',
        'lte' => '<=',
        'ne' => '!=',
        'in' => 'in',
    ];

    public function filter (Request $request){
        $where = [];
        $whereIn=[];
        if(empty($this->allowedOperatorsFields)){
            throw new PropertyException('Property allowedOperatorsFields not defined empty');
        }

        //dd($this->allowedOperatorsFields);
       
        foreach ($this->allowedOperatorsFields as $param => $operators){
            $queryOperator = $request->query($param);
            if($queryOperator){
                foreach ($queryOperator as $operator=>$value){
                    if(!in_array($operator,$operators)){
                        throw new Exception('Operator not allowed');
                    }
                    if(str_contains($value,'[')){
                        $whereIn[] = [
                            $param,
                            explode(',',str_replace(['[',']'],['',''],$value)),
                           $value 
                        ];
                    }else{
                        
                        $where[] = [
                            $param,
                            $this->transalateOperatorsFields[$operator],
                            $value
                        ];

                    }
                }
            }
        }
        if(empty($where) && empty($whereIn)){
            return [];
        }
        
        return [
            'where' => $where,
            'whereIn' => $whereIn
        ];

    }
}