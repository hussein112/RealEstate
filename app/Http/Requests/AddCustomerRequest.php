<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'fullname' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:70', 'unique:App\Models\Customer,email'],
            'phone' => ['required', 'unique:App\Models\Customer,phone', 'regex:/^[0-9]+ [0-9]* [0-9]{3,}$/']
        ];
    }
}
