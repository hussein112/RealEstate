<?php

namespace App\Http\Requests;

use App\Models\Appointement;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAppointementRequest extends FormRequest
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
        $appointement = Appointement::find($this->id);
        return [
            'title' => ['required', 'string', 'max:200', Rule::unique('appointement', 'title')->ignore($appointement, 'title')],
            'notes' => ['nullable', 'string', 'max:450'],
            'property' => ['nullable']
        ];
    }
}
