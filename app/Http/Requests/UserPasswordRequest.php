<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserPasswordRequest extends FormRequest
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
            'password' => 'required|confirmed|min:6'
        ];
    }

    public function messages()
    {
        return [
            'password.required' => __('login.password.required'),
            'password.confirmed' => __('login.password.confirmed'),
            'password.min' => __('login.password.min'),
        ];
    }
}
