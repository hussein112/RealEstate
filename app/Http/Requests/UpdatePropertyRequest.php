<?php

namespace App\Http\Requests;

use App\Models\Property;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
        $property = Property::find($this->id);
        return [
            'size' => ['numeric', 'max_digits:4'],
            'title' => ['max:300', 'regex:/[\s\Wa-zA-z0-9]/', Rule::unique('property', 'title')->ignore($property, 'title')],
            'description' => ['max:450', 'regex:/[\s\Wa-zA-z0-9]/'],
            'price' => ['numeric', 'max_digits:6'],
            'city' => ['regex:/[\s\Wa-zA-z0-9]/', 'max:120'],
            'address' => ['regex:/[\s\Wa-zA-z0-9]/', 'max:400'],
            'bedrooms' => ['numeric', 'max_digits:2'],
            'bathrooms' => ['numeric', 'max_digits:2'],
            'type' => ['numeric', 'max_digits:1'],
            'for' => ['string', 'max:20'],
            'owner' => ['numeric', 'max_digits:4'],
            'images.image.*' => ['image', 'max:3000']
        ];
    }
}
