<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Traits\HttpResponses;
use App\Models\Wallet;

class WalletTransferRequest extends FormRequest
{
    use HttpResponses;
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'from'=> 'required|exists:wallets,wallet_address',
            'to'=> 'required|exists:wallets,wallet_address',
            'amount'=> 'required|numeric|min:1',

        ];
    }

    public function withValidator(Validator $validator){
        
        $validator->after(function ($validator){
            $fromWallet = Wallet::select('amount')->where('wallet_address',$this->input('from'))->first();
            $toWallet = Wallet::where('wallet_address',$this->input('to'))->first();
            
            if(empty($fromWallet)){
                $validator->errors()->add('from','Wallet not found');
            }
            if(empty($toWallet)){
                $validator->errors()->add('to','Wallet not found');
            }

            $walletAmount = Wallet::select('amount')->where('wallet_address',$this->input('from'))->first()->amount;          
            $walletAmount < $this->input('amount') ? $validator->errors()->add('amount', 'Insufficient balance') : null;
            
            $this->input('from') == $this->input('to') ? $validator->errors()->add('to', 'Cannot transfer to the same wallet') : null;
        });
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();

        throw new HttpResponseException($this->error('Validation error', 422, $errors));
    }
}
