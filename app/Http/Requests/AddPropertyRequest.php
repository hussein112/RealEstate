<?php

namespace App\Http\Requests;

use App\Custom\MaxFeaturesPerProperty;
use App\Custom\MaxImagesPerProperty;
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
            'title' => ['required', 'unique:App\Models\Property,title', 'max:100', 'string'],
            'description' => ['max:450', 'string'],
            'price' => ['required', 'numeric', 'max_digits:6'],
            'city' => ['required', 'string', 'max:40'],
            'address' => ['required', 'string', 'max:150'],
            'bedrooms' => ['required', 'numeric', 'max_digits:2'],
            'bathrooms' => ['required', 'numeric', 'max_digits:2'],
            'type' => ['required', 'numeric', 'max_digits:1'],
            'for' => ['required', 'string', 'max:20'],
            'owner' => ['required', 'numeric'],
            'images.image' => ['required', 'max:'.MaxImagesPerProperty::getMax()],
            'images.image.*' => ['image', 'max:2000']
        ];
    }

    public function messages()
    {
        return [
            'images.image.required' => "Upload at least one image",
            'images.image.max' => "Maximum of " . MaxImagesPerProperty::getMax() . " images are allowed.",
        ];
    }
}
