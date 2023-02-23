<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddPostRequest extends FormRequest
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
            'title' => ['required', 'regex:/[\s\Wa-zA-z0-9]/'],
            'post' => ['required', 'regex:/[\s\Wa-zA-z0-9]/'],
            'category' => ['numeric']
        ];
    }
}
