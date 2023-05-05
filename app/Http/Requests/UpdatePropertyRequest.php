<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePropertyRequest extends FormRequest
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
            'size' => ['numeric', 'max_digits:4'],
            'title' => ['unique:property', 'max:300', 'regex:/[\s\Wa-zA-z0-9]/'],
            'description' => ['max:450', 'regex:/[\s\Wa-zA-z0-9]/'],
            'price' => ['numeric', 'max_digits:6'],
            'city' => ['regex:/[\s\Wa-zA-z0-9]/', 'max:120'],
            'address' => ['regex:/[\s\Wa-zA-z0-9]/', 'max:400'],
            'bedrooms' => ['numeric', 'max_digits:2'],
            'bathrooms' => ['numeric', 'max_digits:2'],
            'type' => ['numeric', 'max_digits:1'],
            'for' => ['string', 'max:20'],
            'owner' => ['numeric', 'max_digits:4'],
            // 1024 -> 1MB
//            'images' => ['image', 'mimes:jpeg,png,jpg', 'size:1024', 'dimensions:min_width=200,max_width=1000,min_height=100,max_height=100']
//            'images.image' => ,
            'images.image.*' => 'image'
        ];
    }
}
