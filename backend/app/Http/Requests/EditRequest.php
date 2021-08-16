<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'id' => ['numeric', 'exists:App\Models\User,id'],
            'name' => ['string', 'max:50'],
            'last_name' => ['string', 'max:50'],
            'profession' => ['string', 'max:150'],
            'dni' => ['string', 'max:20', 'nullable'],
            'age' => ['numeric', 'digits_between:1,2']
        ];
    }
}
