<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserPhoneRequest extends FormRequest
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
            'phone_number' => 'required|int|min:9|exists:users'
        ];
    }

    public function messages()
    {
        return [
            'phone_number.required' => 'The Phone is requierd',
            'phone_number.int' => 'The Phone must be a number',
            'phone_number.min' => 'The Phone length must be 9',
            'phone_number.max' => 'The Phone length must be 9',
        ];

    }
}
