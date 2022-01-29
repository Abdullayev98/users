<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskDateRequest extends FormRequest
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
        switch($this->request->get('date_type')) {
            case 1:
                return [
                    'start_date'=>'required|date',
                ];
                break;
            case 2:
                return [
                    'end_date'=>'required|date',
                ];
                break;
            case 3:
                return [
                    'start_date'=>'required|date',
                    'end_date'=>'required|date',
                ];

        }
    }

    public function messages()
    {
        return [
            "start_date.required" => 'Date',
            "start_date.date" => "date",
            "end_date.required" => "Required",
            "end_date.date" => "date",
        ];
    }
}
