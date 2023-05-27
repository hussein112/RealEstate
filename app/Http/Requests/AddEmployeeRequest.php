<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class AddEmployeeRequest extends FormRequest
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
            'password' => ['required', Password::min(10)->mixedCase()->numbers()],
            'email' => ['required', 'email', 'unique:App\Models\Employee,email'],
            'phone' => ['required', 'unique:App\Models\Employee,phone', 'regex:/^[0-9]+ [0-9]* [0-9]{3,}$/'],
            'stmt' => ['nullable', 'string', 'max:450'],
            'avatar' => ['nullable', 'image', 'max:2000']
        ];
    }
}
