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
            'title' => ['max:300', 'string', Rule::unique('property', 'title')->ignore($property, 'title')],
            'description' => ['max:450', 'string'],
            'price' => ['numeric', 'max_digits:6'],
            'city' => ['string', 'max:120'],
            'address' => ['string', 'max:400'],
            'bedrooms' => ['numeric', 'max_digits:2'],
            'bathrooms' => ['numeric', 'max_digits:2'],
            'type' => ['numeric', 'max_digits:1'],
            'for' => ['string', 'max:20'],
            'owner' => ['numeric'],
            'images.image.*' => ['image', 'max:3000'],
            'until' => ['nullable']
        ];
    }
}
