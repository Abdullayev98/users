<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRegisterRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone_number' =>  'numeric|unique:users|min:9', // required olindi
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required|min:8',
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
