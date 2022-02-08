<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'phone' => 'required|min:9',
            'description' => 'required|string',
            'start_date' => 'required|string',
            'date_type' => 'required|string',
            'budget' => 'required|string',
            'category_id' => 'required',
            'coordinates' => 'required',
            'address' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Напишите имю',
            'phone.required' => 'Required',
            'description.required' => 'Пополните полю',
            'start_date.required' => 'Required',
            'date_type.required' => 'Required',
            'budget.required' => 'Required',
            'category_id.required' => 'Required',
        ];
    }
}
