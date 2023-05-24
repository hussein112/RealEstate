<?php

namespace App\Http\Requests;

use App\Models\Admin;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UpdateAdminRequest extends FormRequest
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
        $admin = Admin::find($this->id);
        return [
            'fname' => ['string', 'min:3', 'max:40'],
            'mname' => ['string', 'min:3', 'max:40'],
            'lname' => ['string', 'min:3', 'max:40'],
            'email' => ['email', Rule::unique('admin', 'email')->ignore($admin, 'email')],
            'phone' => [Rule::unique('admin', 'phone')->ignore($admin, 'phone'), 'regex:/^[0-9]+ [0-9]* [0-9]{3,}$/'],
            'image' => ['image', 'max:2000']
        ];
    }
}
