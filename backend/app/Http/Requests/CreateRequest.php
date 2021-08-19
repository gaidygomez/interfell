<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'username' => ['required', 'max:50', 'string', 'unique:App\Models\User,username'],
            'name' => ['required', 'string', 'max:50'],
            'last_name' => ['required', 'string', 'max:50'],
            'profession' => ['required', 'string', 'max:150'],
            'dni' => ['required', 'string', 'max:20'],
            'age' => ['numeric', 'digits_between:1,2'],
            'password' => ['required', 'string', 'confirmed', 'min:8']
        ];
    }
}
