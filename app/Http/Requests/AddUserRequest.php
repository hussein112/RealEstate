<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class AddUserRequest extends FormRequest
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
            'fname' => ['required', 'max:200', 'alpha'],
            'mname' => ['required', 'max:200', 'alpha'],
            'lname' => ['required', 'max:', 'alpha'],
            'password' => ['required', Password::min(10)->symbols()->numbers()],
            'phone' => ['required', 'numeric', 'min:6', 'max:11'],
            'email' => ['required', 'email'],
            'avatar' => ['image']
        ];
    }
}
