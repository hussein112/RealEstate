<?php

namespace App\Http\Requests;

use App\Models\Employee;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UpdateEmployeeRequest extends FormRequest
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
        $employee = Employee::find($this->id);
        return [
            'fullname' => ['required', 'string'],
            'email' => ['required', 'email', Rule::unique('team_member', 'email')->ignore($employee, 'email')],
            'phone' => ['required', Rule::unique('team_member', 'phone')->ignore($employee, 'phone'), 'regex:/^[0-9]+ [0-9]* [0-9]{3,}$/'],
            'stmt' => ['nullable', 'string', 'max:450'],
            'avatar' => ['nullable', 'image', 'max:2000']
        ];
    }
}
