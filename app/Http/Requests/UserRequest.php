<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => ['required','email','unique:users'],
            'phone_number' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name  is required',
            'name.string' => 'Name must be a string',
            'email.required' => 'Email is required',
            'email.email' => 'It must be an email',
            'email.unique' => "This email already exists",
            'phone_number.required' => 'Phone number is required',
        ];

    }
}
