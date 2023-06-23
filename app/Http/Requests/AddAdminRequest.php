<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class AddAdminRequest extends FormRequest
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
            'fname' => ['required', 'string', 'min:3', 'max:40'],
            'mname' => ['required', 'string', 'min:3', 'max:40'],
            'lname' => ['required', 'string', 'min:3', 'max:40'],
            'email' => ['required', 'email', 'max:70', 'unique:App\Models\Admin,email'],
            'phone' => ['required', 'unique:App\Models\Admin,phone', 'regex:/^[0-9]+ [0-9]* [0-9]{3,}$/'],
            'password' => ['required', Password::min(10)->mixedCase()->numbers()],
            'image' => ['image', 'max:2000']
        ];
    }
}
