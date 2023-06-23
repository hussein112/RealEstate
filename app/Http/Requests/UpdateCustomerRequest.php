<?php

namespace App\Http\Requests;

use App\Models\Customer;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCustomerRequest extends FormRequest
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
        $customer = Customer::find($this->id);
        return [
            'fullname' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:70', Rule::unique('customer', 'email')->ignore($customer, 'email')],
            'phone' => ['required', 'regex:/^[0-9]+ [0-9]* [0-9]{3,}$/', Rule::unique('customer', 'phone')->ignore($customer, 'phone')]
        ];
    }
}
