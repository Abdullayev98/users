<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateDataRequest extends FormRequest
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
        $validation = [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'age' => 'nullable|int',
            'phone_number' => 'nullable|int|min:9|unique:users',
            'description' => 'nullable',
            'location' => 'nullable',
        ];
        if (auth()->user()->email == $this->request->get('email')) {
            $validation['email'] = "required|email";
        }
        if (auth()->user()->phone_number == $this->request->get('phone_number')) {
            $validation['phone_number'] = "nullable|int|min:9";

        }
        return $validation;
    }


    public function messages()
    {
        return [
            'name.required' => __('login.name.required'),
            'email.required' => __('login.name.required'),
            'age.int' => __('login.name.required'),
            'phone_number.int' => __('login.phone_number.int'),
            'phone_number.min' => __('login.phone_number.min'),
            'phone_number.required' => __('login.phone_number.required'),
            'phone_number.unique' => __('login.phone_number.unique'),
            'role_id.required' => __('login.name.required'),

        ];
    }
}
