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
        session()->flash('phone_another');
        return [
            'name' => 'required|string',
            'email' => ['required','email','unique:users'],
            'phone_number' => 'required|unique:users|min:9|exists:users',
        ];
    }

    public function messages()
    {
        return [
                'name.required' => __('login.name.required'),
                'name.unique' => __('login.name.unique'),
                'phone_number.required' => __('login.phone_number.required'),
                'phone_number.regex' => __('login.phone_number.regex'),
                'phone_number.unique' => __('login.phone_number.unique'),
                'email.required' => __('login.email.required'),
                'email.email' => __('login.email.email'),
                'email.unique' => __('login.email.unique'),
                'password.required' => __('login.password.required'),
                'password.min' => __('login.password.min'),
                'password.confirmed' => __('login.password.confirmed'),
            ];
    }
}
