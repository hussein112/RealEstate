<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddAppointementRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:90', 'unique:App\Models\Appointement,title'],
            'notes' => ['nullable', 'string', 'max:400'],
            'property' => ['nullable']
        ];
    }
}
