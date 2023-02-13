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
            'size' => ['required', 'integer', ''],
            'title' => ['required', 'max:300', 'alpha_num'],
            'description' => ['required', 'max:450', 'alpha_num'],
//            'featured' => ['required' ,'integer', ''],
            'price' => ['required', 'integer', ''],
            'location' => ['required', 'alpha_num', 'max:120'],
            'bedrooms' => ['required', 'integer', ''],
            'bathrooms' => ['required', 'integer', ''],
            'type' => ['required', 'integer'],
            'for' => ['required', 'string', 'max:20'],
            'owner' => ['required', 'integer'],
            'features' => [],
            // 1024 -> 1MB
//            'images' => ['image', 'mimes:jpeg,png,jpg', 'size:1024', 'dimensions:min_width=200,max_width=1000,min_height=100,max_height=100']
            'images' => ['required']
        ];
    }
}
