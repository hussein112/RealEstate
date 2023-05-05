<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AddPropertyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
//        return (Auth::guard() == 'admin');
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
            'size' => ['required', 'numeric', 'max_digits:4'],
            'title' => ['required', 'unique:property', 'max:300', 'regex:/[\s\Wa-zA-z0-9]/'],
            'description' => ['required', 'max:450', 'regex:/[\s\Wa-zA-z0-9]/'],
            'price' => ['required', 'numeric', 'max_digits:6'],
            'city' => ['required', 'regex:/[\s\Wa-zA-z0-9]/', 'max:120'],
            'address' => ['required', 'regex:/[\s\Wa-zA-z0-9]/', 'max:400'],
            'bedrooms' => ['required', 'numeric', 'max_digits:2'],
            'bathrooms' => ['required', 'numeric', 'max_digits:2'],
            'type' => ['required', 'numeric', 'max_digits:1'],
            'for' => ['required', 'string', 'max:20'],
            'owner' => ['required', 'numeric', 'max_digits:4'],
            // 1024 -> 1MB
//            'images' => ['image', 'mimes:jpeg,png,jpg', 'size:1024', 'dimensions:min_width=200,max_width=1000,min_height=100,max_height=100']
            'images.image' => ['required'],
            'images.image.*' => 'image'
        ];
    }
}
