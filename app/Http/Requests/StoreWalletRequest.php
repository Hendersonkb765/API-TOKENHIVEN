<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\HttpResponses;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreWalletRequest extends FormRequest
{
    use HttpResponses;
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'ownerId'=>'required|integer|exists:wallet_owners,id',
            'amount'=>'numeric'
        ];
    }
    public function messages(){
        return [
            'owner_id.exists'=> 'There is no wallet owner with the given owner_id in the database'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();

        throw new HttpResponseException($this->error('Validation error', 422, $errors));
    }
}
