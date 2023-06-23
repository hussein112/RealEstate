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
            'fname' => ['required', 'string', 'max:40'],
            'mname' => ['required', 'string', 'max:40'],
            'lname' => ['required', 'string', 'max:40'],
            'password' => ['required', Password::min(10)->mixedCase()->numbers()],
            'phone' => ['required', 'unique:App\Models\User,phone', 'regex:/^[0-9]+ [0-9]* [0-9]{3,}$/'],
            'email' => ['required', 'email', 'max:70', 'unique:App\Models\User,email'],
            'avatar' => ['image', 'max:2000']
        ];
    }


    public function messages(){
        return [
            'fname.required' => 'First Name is Required',
            'mname.required' => 'Middle Name is Required',
            'lname.required' => 'Last Name is Required',
            'password.required' => 'Password is Required',
            'phone.required' => 'Phone is Required',
            'email.required' => "Email is required",

            'fname.min' => 'First Name Must be At Least 3 Characters',
            'mname.min' => 'Middle Name Must be At Least 3 Characters',
            'lname.min' => 'Last Name Must be At Least 3 Characters',

            'fname.max' => 'First Name Must be At Maximum 40 Characters',
            'mname.max' => 'Middle Name Must be At Maximum 40 Characters',
            'lname.max' => 'Last Name Must be At Maximum 40 Characters',

            'email.email' => "Email Must Be Valid",

            'phone.regex' => "Phone Must be in The Form: 03 123 456",

            'avatar.image' => "Images Only: (.jpg, .jpeg, .png)",
            'avatar.size' => "Maximum Size Should be no more than 2 MB"
        ];
    }
}
