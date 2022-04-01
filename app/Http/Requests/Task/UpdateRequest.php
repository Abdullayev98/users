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
        $rule = [
            'name' => 'required',
            'address' => 'required',
            'date_type' => 'required',
            'budget' => 'required',
            'description' => 'required',
            'category_id' => 'required|numeric',
            //'phone' => 'required|regex:/^\+998(9[012345789])[0-9]{7}$/'
            'phone' => 'required|numeric|min:9'
        ];
        $rule = $this->dateRule($rule);
        return $rule;
    }

    public function dateRule($rule)
    {
        switch($rule['date_type']) {
            case 1:
                $rule['start_date'] = 'required|date';
                $rule['date_type'] = 'required';
                break;
            case 2:
                $rule['end_date'] = 'required|date';
                $rule['date_type'] = 'required';
                break;
            case 3:
                $rule['start_date'] = 'required|date';
                $rule['end_date'] = 'required|date';
                $rule['date_type'] = 'required';
                break;

        }
        return $rule;

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
