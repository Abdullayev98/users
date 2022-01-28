<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'phone' =>  'unique:users',
            'password' => 'required|confirmed',
        ];
    }
    public function messages()
    {
        return [
                'name.required' => 'Требуется заполнение!',
                'name.unique' => 'Пользователь с таким именем уже существует!',
                'phone_number.required' => 'Требуется заполнение!',
                'phone_number.regex' => 'Неверный формат номера телефона!',
                'phone_number.unique' => 'Этот номер есть в системе!',
                'email.required' => 'Требуется заполнение!',
                'email.email' => 'Требуется заполнение!',
                'email.unique' => 'Пользователь с такой почтой уже существует!',
                'password.required' => 'Требуется заполнение!',
                'password.min' => 'Пароли должны содержать не менее 6-ми символов',
                'password.confirmed' => 'Пароль не совпадает'
        ];
    }
}
