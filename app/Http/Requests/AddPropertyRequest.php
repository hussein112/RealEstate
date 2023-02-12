<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddPropertyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'size' => ['required', 'integer', 'size:3'],
            'title' => ['required', 'max:300', 'alpha_num'],
            'description' => ['required', 'max:450', 'alpha_num'],
            'featured' => ['required' ,'integer', 'size:1'],
            'price' => ['required', 'integer', 'size:6'],
            'location' => ['required', 'alpha_num', 'max:120'],
            'bedrooms' => ['required', 'integer', 'size:2'],
            'bathrooms' => ['required', 'integer', 'size:2'],
            'date_posted' => ['required', ''],
            'issuer' => ['required', 'integer'],
            'type' => ['required', 'integer'],
            'for' => ['required', 'string', 'max:20'],
            'owner' => ['required', 'integer'],
            'features' => [],
            'images' => ['image']
        ];
    }
}
