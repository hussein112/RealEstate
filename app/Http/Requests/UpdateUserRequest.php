<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UpdateUserRequest extends FormRequest
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
        $user = User::find($this->id);
        return [
            'fname' => ['string', 'min:3', 'max:40'],
            'mname' => ['string', 'min:3', 'max:40'],
            'lname' => ['string', 'min:3', 'max:40'],
            'password' => ['nullable', Password::min(10)->mixedCase()->numbers()],
            'phone' => ['regex:/^[0-9]+ [0-9]* [0-9]{3,}$/', Rule::unique('user', 'phone')->ignore($user, 'phone')],
            'email' => ['email', Rule::unique('user', 'email')->ignore($user, 'email')],
            'avatar' => ['image', 'max:2000']
        ];
    }
}
