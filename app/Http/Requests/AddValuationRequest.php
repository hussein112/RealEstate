<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddValuationRequest extends FormRequest
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
            'fullname' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:App\Models\Valuation,issuer_email'],
            'phone' => ['required', 'regex:/^[0-9]+ [0-9]* [0-9]{3,}$/', 'unique:App\Models\Valuation,issuer_phone'],
            'addressone' => ['required', 'string'],
            'addresstwo' => ['nullable', 'string'],
            'state' => ['required', 'string'],
            'postalcode' => ['required'],
            'city' => ['required', 'string'],
            'bedrooms' => ['required', 'numeric', 'max_digits:2'],
            'bathrooms' => ['required', 'numeric', 'max_digits:2'],
            'type' => ['required'],
            'description' => ['required', 'string', 'max:450'],
        ];
    }
}
