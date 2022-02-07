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
            'phone' => 'required|string',
            'description' => 'required|string',
            'start_date' => 'required|string',
            'date_type' => 'required|string',
//            'location0' => 'required',
//            'location1' => 'required|string',
            'budget' => 'required|string',
            'category_id' => 'required',
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
//            'location0.required' => 'Ошибка',
//            'location1.required' => 'Required',
            'budget.required' => 'Required',
            'category_id.required' => 'Required',
        ];
    }
}
